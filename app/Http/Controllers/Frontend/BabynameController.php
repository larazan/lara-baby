<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Babyname;
use App\Models\Origin;
use App\Models\Religion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BabynameController extends Controller
{
    //
    public function index()
    {
        $letters = range('A', 'Z');
        $genders = ['boy', 'girl', 'unisex'];
        $origins = Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $religions = Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $allnames = DB::table('babynames')->select(['id', 'slug', 'name', 'gender_id', 'locale', 'status'])->orderBy('name', 'asc')->where('status', 'active');
        $countNames = count($allnames->get());
        $babynames = $allnames->paginate(30);

        return $this->loadTheme('babyname.index', compact('letters', 'genders', 'babynames', 'origins', 'religions', 'countNames'));
    }

    public function letter($letter)
    {
        $letters = range('A', 'Z');
        $babynames = DB::table('babynames')->select(['id', 'slug', 'name', 'locale', 'status'])->where('name', 'like', "{$letter}%")->orderBy('name', 'asc')->where('status', 'active')->paginate(20);

        return $this->loadTheme('babyname.letter', compact('letters', 'babynames'));
    }

    public function religion($religion)
    {
        
        if ($religion) {
            $rel = Religion::where('name', strtolower($religion))->first();
            $religion_id = $rel->id;
        } else {
            return redirect('baby-name');
        }

        $religions = Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $babynames = DB::table('babynames')->select(['id', 'slug', 'name', 'locale', 'religion_id', 'status'])->orderBy('name', 'asc')->where('religion_id', $religion_id)->where('status', 'active')->paginate(20);
    
        return $this->loadTheme('babyname.religion', compact('babynames', 'religions'));
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
}
