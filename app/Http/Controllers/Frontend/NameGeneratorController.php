<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Babyname;
use App\Models\Namelist;
use App\Models\Country;
use App\Models\Origin;
use App\Models\Religion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NameGeneratorController extends Controller
{
    //
    public function index(Request $request)
    {
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins =  Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $religions = Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $countries = Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $title = "name generator";        

        return $this->loadTheme('babyname.generator', compact('title', 'letters', 'genders', 'origins', 'religions', 'countries',));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'num_names' => 'required|integer|min:2|max:3',
            'origins' => 'nullable',
            'origins.*' => 'string',
            'gender' => 'nullable|in:male,female,unisex',
            'limit' => 'nullable|integer|min:1|max:50', // To control the number of suggestions
        ]);

        $numNames = (int) $request->num_names;
        $selectedOrigins = $request->origins ?? [];
        $gender = $request->gender;
        $limit = (int) ($request->limit ?? 10); // Default to 10 suggestions

        // 1. Fetch eligible single names based on filters
        $query = Babyname::query();

        if (!empty($selectedOrigins)) {
            $query->where('origin_id', $selectedOrigins);
        }

        if ($gender) {
            $query->where(function ($q) use ($gender) {
                $q->where('gender_id', $gender);
            });
        }

        // Fetch a large enough pool of names to make combinations from
        // We'll randomly select from these in the combination logic
        // $eligibleNames = $query->inRandomOrder()->get();
        $eligibleNames = $query->select('name', 'meaning', 'slug')
                               ->inRandomOrder()
                               ->get();

        if ($eligibleNames->count() < $numNames) {
            return response()->json(['suggestions' => [], 'message' => 'Not enough unique names found with these filters to create combinations.'], 200);
        }

        $suggestions = [];
        $generatedCombinationStrings = []; // To keep track of unique combined name strings
        $attemptCount = 0;
        $maxAttempts = 500; // Prevent infinite loop in case of very strict filters

        // 2. Generate combinations
        while (count($suggestions) < $limit && $attemptCount < $maxAttempts) {
            $attemptCount++;

            $randomNames = $eligibleNames->random($numNames); // Select N random names from the eligible pool

            // Extract the full name string for uniqueness check (e.g., "Alice Rose")
            $fullNameString = $randomNames->pluck('name')->sort()->implode(' ');

            // Check if this combination (by its full name string) has already been generated
            if (!in_array($fullNameString, $generatedCombinationStrings)) {
                // Map each selected name object to include only the desired attributes
                $formattedNames = $randomNames->map(function ($name) {
                    return [
                        'name' => $name->name,
                        'meaning' => $name->meaning,
                        'slug' => $name->slug,
                    ];
                })->values()->toArray(); // Ensure it's a simple array of objects

                // Sort the formatted names by their 'name' property for consistent output
                usort($formattedNames, function($a, $b) {
                    return strcmp($a['name'], $b['name']);
                });

                $suggestions[] = $formattedNames;
                $generatedCombinationStrings[] = $fullNameString; // Add to our unique tracker
            }
        }

        return response()->json(['suggestions' => $suggestions]);
    }
}
