<?php

namespace App\Livewire\Admin;

use App\Models\Babyname;
use App\Models\Language;
use App\Models\Country;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ImportName extends Component
{
    use WithFileUploads;

    public $batchId;
    
    public $name;
    public $file;
    public $pronounce;
    public $variations;
    public $nativeName;
    public $meaning;
    public $genderId = 2;
    public $genders = [
        1 => 'male',
        2 => 'female',
        3 => 'unisex',
    ];
    public $countryId;
    public $religionId;
    public $locale = 'en';

    public $catStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];
   
    public $sort = 'asc';

    public function import()
    {
        $this->validate([
            // 'religionId' => 'required',
            'locale' => 'required',
            'file' => 'required|mimes:csv',
        ]);

        ini_set('max_execution_time', 14400);

        if ($this->file) {
            
            // import/upload csv
            //read csv file and skip data
            $handle = fopen($this->file->path(), 'r');

            //skip the header row
            fgetcsv($handle);

            $chunksize = 1000;
            while(!feof($handle))
            {
                $chunkdata = [];

                for($i = 0; $i<$chunksize; $i++)
                {
                    $data = fgetcsv($handle);
                    if($data === false)
                    {
                        break;
                    }
                    $chunkdata[] = $data; 
                }
                //
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                DB::statement('ALTER TABLE babynames DISABLE KEYS');

                foreach($chunkdata as $column){
                    $name = $column[0];
                    $meaning = $column[1];
                    $gender = $column[2];
                    $religion = $column[3];
        
                    //create series
                    Babyname::Insert([
                        'uuid' => Str::uuid(),
                        'name' => strtolower($name),
                        'slug' => Babyname::uniqueSlug($name),
                        // 'pronounce' => strtolower($this->pronounce),
                        // 'native_name' => $this->nativeName,
                        'meaning' => $meaning,
                        // 'variations' => $this->variations,
                        'gender_id' => $this->genderId,
                        // 'country_id' => $this->countryId,
                        'religion_id' => $religion,
                        'locale' => $this->locale,
                        'status' => 'active',
                        'created_at' => Carbon::now(),
                    ]);
                }

                DB::statement('ALTER TABLE babynames ENABLE KEYS');
                DB::statement('SET FOREIGN_KEY_CHECKS=1');

            }
            fclose($handle);

            // New approch
            // $data = [];
            // while(($row = fgetcsv($handle)) ==! false)
            // {
            //     $data[] = [
            //             'uuid' => Str::uuid(),
            //             'name' => strtolower($row[0]),
            //             'slug' => Babyname::uniqueSlug($row[0]),
            //             // 'pronounce' => strtolower($this->pronounce),
            //             // 'native_name' => $this->nativeName,
            //             'meaning' => $row[1],
            //             // 'variations' => $this->variations,
            //             // 'gender_id' => $row[2],
            //             // 'country_id' => $this->countryId,
            //             'religion_id' => $row[3],
            //             'locale' => $this->locale,
            //             'status' => 'active'
            //         ];
            // }

            // DB::statement('SET FOREIGN_KEY_CHECKS=0');
            // DB::statement('ALTER TABLE babynames DISABLE KEYS');

            // foreach(array_chunk($data, 1000) as $chunk) {
            //     Babyname::Insert($chunk);
            // }

            // DB::statement('ALTER TABLE babynames ENABLE KEYS');
            // DB::statement('SET FOREIGN_KEY_CHECKS=1');

            // fclose($handle);

            $this->reset('file');

            $this->dispatch(
                'banner-message', 
                style: 'success',
                message: 'Baby name import successfully!',
            );
           
                // $this->dispatch(
                //     'banner-message', 
                //     style: 'danger',
                //     message: 'Baby name created failed!',
                // );
            
        }
    }

    public function render()
    {
        return view('livewire.admin.import-name')->with([
            'countries' => Country::OrderBy('id', $this->sort)->get(),
            'languages' => Language::OrderBy('id', $this->sort)->get(),
            'religions' => Religion::OrderBy('id', $this->sort)->get()
        ]);
    }
}
