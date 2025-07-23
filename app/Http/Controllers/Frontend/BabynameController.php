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
use Illuminate\Support\Facades\Cache;

class BabynameController extends Controller
{
    //
   

    public function index(Request $request)
    {
        $locale = app()->currentLocale();
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins = Cache::remember('origins', now()->addHour(), function () {
            return Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $religions = Cache::remember('religions', now()->addHour(), function () {
            return Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $countries = Cache::remember('countries', now()->addHour(), function () {
            return Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });

        $query = DB::table('babynames')->select([
            'id',
            'slug', 
            'name', 
            'meaning',
            'gender_id', 
            'country_id',
            'religion_id',
            'origin_id', 
            'locale', 
            'status'
            ])->where('locale', $locale)->where('status', 'active');

        if ($request->search) {
            $keyword = $request->search;
            $title = Str::ucfirst($keyword) . " Baby names";
        } else {
            $keyword = null;
            $title = "Baby names";
        }

        // religion
        if ($request->religion) {
            $religion = $request->religion;
        } else {
            $religion = null;
        }
        
        // gender
        if ($request->gender) {
            $gender = $request->gender;
        } else {
            $gender = null;
        }

        // country
        if ($request->country) {
            $country = $request->country;
        } else {
            $country = null;
        }

        // origin
        if ($request->origin) {
            $origin = $request->origin;
        } else {
            $origin = null;
        }

        $query->when($request->search, function ($q) use ($keyword) {
            return $q->where('name', 'like', "%{$keyword}%");
        });

        // religion
        $query->when($request->religion, function ($q) use ($religion) {
            return $q->where('religion_id', $religion);
        });

        // gender
        $query->when($request->gender, function ($q) use ($gender) {
            return $q->where('gender_id', $gender);
        });

        // country
        $query->when($request->country, function ($q) use ($country) {
            return $q->where('country_id', $country);
        });

        // origin
        $query->when($request->origin, function ($q) use ($origin) {
            return $q->where('origin_id', $origin);
        });

        $countNames = count($query->get());
        $babynames = $query->paginate(20)->withQueryString();

        return $this->loadTheme('babyname.index', compact('title', 'letters', 'babynames', 'genders', 'origins', 'religions', 'countries', 'countNames'));
    }

    public function show($slug)
    {
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins = Cache::remember('origins', now()->addHour(), function () {
            return Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $religions = Cache::remember('religions', now()->addHour(), function () {
            return Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $countries = Cache::remember('countries', now()->addHour(), function () {
            return Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });

        $babyname = Babyname::select([
            'name', 
            'meaning', 
            'slug', 
            'origin_id', 
            'gender_id', 
            'country_id', 
            'religion_id', 
            'status',
            'locale',
            ])->active()->where('slug', $slug)->first();
        
        if (!$babyname) {
            return redirect('baby-name');
        }

        // Related Name
        $searchTerm = $babyname->name;
        $threshold = 1; // Define your Levenshtein distance threshold (e.g., allow up to 3 edits)

        $names = Babyname::select([
            'name', 
            'meaning', 
            'slug', 
            'origin_id', 
            'gender_id', 
            'country_id', 
            'religion_id', 
            'status',
            'locale',
        ])->where('slug', '!=', $slug)->active()->get();

        // 2. Filter the collection using PHP's levenshtein function
        $relatedNames = $names->filter(function ($baby) use ($searchTerm, $threshold) {
            $distance = levenshtein($searchTerm, $baby->name);
            return $distance <= $threshold;
        });

        // $searchTerm = $babyname->name;
        // $maxDistance = 2;

        // $results = DB::table('babynames')
        //       ->select('name')
        //       ->selectRaw("LEVENSHTEIN(name, ?) AS distance", [$searchTerm])
        //       ->whereRaw("LEVENSHTEIN(name, ?) <= ?", [$searchTerm, $maxDistance])
        //       ->orderBy('distance')
        //       ->get();

        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            $babyname->name,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        $title = "Meaning, origin and history of the name " . $babyname->name;

        // Namelist
        $namelists = Namelist::where('full_name', 'like', '%'.$babyname->name.'%')->orderBy('id', 'desc')->get();
        
        return $this->loadTheme('babyname.detail', compact('letters', 'genders', 'origins', 'religions', 'countries', 'title', 'babyname', 'shareComponent', 'relatedNames', 'namelists'));
    }

    public function letter($letter)
    {
        $locale = app()->currentLocale();
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins = Cache::remember('origins', now()->addHour(), function () {
            return Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $religions = Cache::remember('religions', now()->addHour(), function () {
            return Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $countries = Cache::remember('countries', now()->addHour(), function () {
            return Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });

        $alpha = Str::lower($letter);
        
        $query = DB::table('babynames')->select([
            'slug', 
            'name', 
            'meaning', 
            'gender_id', 
            'country_id',
            'religion_id',
            'origin_id', 
            'locale', 
            'status'
            ])->where('locale', $locale)->where('status', 'active');
        
        $query->when($alpha, function ($q) use ($alpha) {
            return $q->where('name', 'like', "{$alpha}%");
        });

        $countNames = count($query->get());
        $babynames = $query->paginate(20)->withQueryString();

        return $this->loadTheme('babyname.letter', compact('letters', 'babynames', 'countNames', 'genders', 'origins', 'religions', 'countries'));
    }

    public function religion($religion)
    {
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins = Cache::remember('origins', now()->addHour(), function () {
            return Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $religions = Cache::remember('religions', now()->addHour(), function () {
            return Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $countries = Cache::remember('countries', now()->addHour(), function () {
            return Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });

        if ($religion) {
            $rel = Religion::where('name', strtolower($religion))->first();
            $religion_id = $rel->id;
            $rel_name = $rel->name;
        } else {
            return redirect('baby-name');
        }

        // $babynames = DB::table('babynames')->select(['id', 'slug', 'name', 'locale', 'religion_id', 'status'])->orderBy('name', 'asc')->where('religion_id', $religion_id)->where('status', 'active')->paginate(20);
        $query = DB::table('babynames')->select(['slug', 'name', 'religion_id', 'locale', 'status'])->where('status', 'active');
        
        $query->when($religion, function ($q) use ($religion_id){
            return $q->where('religion_id', $religion_id);
        });

        $countNames = count($query->get());
        $babynames = $query->paginate(20)->withQueryString();
        
        return $this->loadTheme('babyname.religion', compact('rel_name', 'babynames', 'countNames', 'genders', 'origins', 'religions', 'countries'));
    }

    public function origin($origin)
    {
        if ($origin) {
            $ori = Origin::where('name', strtolower($origin))->first();
            $origin_id = $ori->id;
        } else {
            return redirect('baby-name');
        }

        $origins = Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $babynames = DB::table('babynames')->select(['id', 'slug', 'name', 'locale', 'origin_id', 'status'])->orderBy('name', 'asc')->where('origin_id', $origin_id)->where('status', 'active')->paginate(20);
    
        return $this->loadTheme('babyname.origin', compact('babynames', 'origins'));
    }

    public function gender($gender)
    {
        $letters = range('A', 'Z');
        $genders = [ 1 => 'boy', 2 => 'girl', 3 => 'unisex'];
        $origins = Cache::remember('origins', now()->addHour(), function () {
            return Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $religions = Cache::remember('religions', now()->addHour(), function () {
            return Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });
        $countries = Cache::remember('countries', now()->addHour(), function () {
            return Country::select(['id', 'name'])->orderBy('name', 'asc')->get();
        });

        if ($gender) {
            switch ($gender) {
                case 'boy':
                    $gender_id = 1;
                    break;
                case 'girl':
                    $gender_id = 2;
                    break;
                default:
                    $gender_id = 3;
                    break;
            }
            
        } else {
            return redirect('baby-name');
        }

        // $babynames = DB::table('babynames')->select(['id', 'slug', 'name', 'locale', 'religion_id', 'status'])->orderBy('name', 'asc')->where('religion_id', $religion_id)->where('status', 'active')->paginate(20);
        $query = DB::table('babynames')->select(['slug', 'name', 'gender_id', 'locale', 'status'])->where('status', 'active');
        
        $query->when($gender, function ($q) use ($gender_id){
            return $q->where('gender_id', $gender_id);
        });

        $countNames = count($query->get());
        $babynames = $query->paginate(20)->withQueryString();
        
        return $this->loadTheme('babyname.gender', compact('gender', 'letters', 'babynames', 'countNames', 'genders', 'origins', 'religions', 'countries'));
    
    }

    public function generate(Request $request)
    {
        $request->validate([
            'num_names' => 'required|integer|min:2|max:3',
            'origins' => 'nullable|array', // Ensure origins is an array
            'origins.*' => 'string',
            'gender' => 'nullable|in:male,female,unisex',
            'limit' => 'nullable|integer|min:1|max:50',
        ]);

        $numNames = (int) $request->num_names;
        $selectedOrigins = $request->origins ?? [];
        $gender = $request->gender;
        $limit = (int) ($request->limit ?? 10);

        // 1. Fetch eligible single names based on filters
        $query = Babyname::query();

        if (!empty($selectedOrigins)) {
            // Use whereIn for multiple origins
            $query->whereIn('origin_id', $selectedOrigins);
        }

        if ($gender) {
            // Assuming 'gender_id' column stores 'male', 'female', or 'unisex' strings
            $query->where('gender_id', $gender);
        }

        // Select 'name', 'meaning', and 'slug' directly from the database
        $eligibleNames = $query->select('name', 'meaning', 'slug')
                               ->inRandomOrder()
                               ->get();

        if ($eligibleNames->count() < $numNames) {
            return response()->json(['suggestions' => [], 'message' => 'Not enough unique names found with these filters to create combinations.'], 200);
        }

        $suggestions = [];
        $generatedCombinationStrings = []; // To keep track of unique combined name strings
        $attemptCount = 0;
        $maxAttempts = 500;

        // 2. Generate combinations
        while (count($suggestions) < $limit && $attemptCount < $maxAttempts) {
            $attemptCount++;

            // Select N random name objects from the eligible pool
            $randomNames = $eligibleNames->random($numNames);

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


// /baby-name?page=5