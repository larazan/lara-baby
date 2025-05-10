<?php

namespace App\Livewire\Admin;

use App\Models\Babyname;
use App\Models\Language;
use App\Models\Country;
use App\Models\Religion;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

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
    public $genderId = 1;
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

        if ($this->file) {
            
            // import/upload csv
            //read csv file and skip data
            $handle = fopen($this->file->path(), 'r');

            //skip the header row
            fgetcsv($handle);

            $chunksize = 25;
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

                foreach($chunkdata as $column){
                    $name = $column[0];
                    $meaning = $column[1];
                    $gender = $column[2];
        
                    //create series
                    Babyname::create([
                        'uuid' => Str::uuid(),
                        'name' => strtolower($name),
                        'slug' => Babyname::uniqueSlug($name),
                        // 'pronounce' => strtolower($this->pronounce),
                        // 'native_name' => $this->nativeName,
                        'meaning' => $meaning,
                        // 'variations' => $this->variations,
                        'gender_id' => $gender,
                        // 'country_id' => $this->countryId,
                        // 'religion_id' => $this->religionId,
                        'locale' => $this->locale,
                        'status' => 'active'
                    ]);
                }
            }
            fclose($handle);

                
            $this->dispatch(
                'banner-message', 
                style: 'success',
                message: 'Baby name created successfully!',
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
