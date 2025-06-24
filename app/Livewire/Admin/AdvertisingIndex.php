<?php

namespace App\Livewire\Admin;

use App\Models\Advertising;
use App\Models\AdvertisingSegment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Image;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class AdvertisingIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $showAdvertisingModal = false;
    public $showAdvertisingDetailModal = false;
    
    public $title;
    public $description;
    public $start;
    public $end;
    public $url;
    
    public $file;
    public $advertisingId;
    public $segmentId;
    public $oldImage;
    public $advertisingStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $search = '';
    public $sort = 'desc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected function rules() 
    { 
        return [
            'segmentId' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'url' => 'required',
            // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }

    public function mount()
    {
        $this->start = today()->format('Y-m-d');
        $this->end = today()->format('Y-m-d');
    }

    public function showCreateModal()
    {
        $this->showAdvertisingModal = true;
    }

    public function closeConfirmModal()
    {
        $this->showConfirmModal = false;
    }

    public function deleteModal($id)
    {
        $this->showConfirmModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Advertising::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Advertising deleted successfully!',
        );
    }

    public function createAdvertising()
    {
        $this->validate();
  
        $new = Str::slug($this->title) . '_' . time();

        $advertising = new Advertising();
        $advertising->segment_id = $this->segmentId;
        $advertising->title = $this->title;
        $advertising->description = $this->description;
        $advertising->start = $this->start;
        $advertising->end = $this->end;
        $advertising->url = $this->url;
        $advertising->status = $this->advertisingStatus;

        if (!empty($this->file)) {
            $filename = $new . '.' . $this->file->getClientOriginalName();

            //
            $path = Advertising::UPLOAD_DIR;
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($this->file);

            // check directory
            if (!File::isDirectory(public_path('storage/'.$path))) {
                File::makeDirectory(public_path('storage/'.$path), 0777, true, true);
            }

            $filePath = $this->file->storeAs(Advertising::UPLOAD_DIR, $filename, 'public');
            if ($filePath) {
                // generate resize image and thumbnail
                
                // SMALL 
                $small_path = $path.'/small/';
                if (!File::isDirectory(public_path('storage/'.$small_path))) {
                    File::makeDirectory(public_path('storage/'.$small_path), 0777, true, true);
                }

                $size = explode('x', Advertising::SMALL);
                list($width, $height) = $size;
                $image->resize($width, $height);
                $image->save(public_path('storage/'.$small_path).$filename);

                // thumbnail
                // Image::make($path.$filename)
                //     ->fit(250, 250)
                //     ->save($resized_path.'thumb_'.$filename);

            }

            $advertising->original = $filePath;
            // $advertising->small =$resizedImage['small'];
        }

        $advertising->save();

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Advertising created successfully!',
        );
    }

    public function showEditModal($advertisingId)
    {
        $this->reset(['title']);
        $this->advertisingId = $advertisingId;
        $advertising = Advertising::find($advertisingId);
        $this->segmentId = $advertising->segment_id;
        $this->title = $advertising->title;
        $this->description = $advertising->description;
        $this->start = $advertising->start;
        $this->end = $advertising->end;
        $this->url = $advertising->url;
        $this->oldImage = $advertising->small;
        $this->advertisingStatus = $advertising->status;
        $this->showAdvertisingModal = true;
    }
    
    public function updateAdvertising()
    {
        $this->validate();
        $advertising = Advertising::findOrFail($this->advertisingId);
  
        $new = Str::slug($this->title) . '_' . time();
        
        if ($this->advertisingId) {
            if ($advertising) {

                // $advertising = Advertising::where('id', $this->advertisingId)->first();
                $advertising->segment_id = $this->segmentId;
                $advertising->title = $this->title;
                $advertising->description = $this->description;
                $advertising->start = $this->start;
                $advertising->end = $this->end;
                $advertising->url = $this->url;
                $advertising->status = $this->advertisingStatus;

                if (!empty($this->file)) {
                    // delete image
			        $this->deleteImage($this->advertisingId);

                    $filename = $new . '_' . $this->file->getClientOriginalName();

                    //
                    $path = Advertising::UPLOAD_DIR;
                    $manager = new ImageManager(Driver::class);
                    $image = $manager->read($this->file);

                    // check directory
                    if (!File::isDirectory(public_path('storage/'.$path))) {
                        File::makeDirectory(public_path('storage/'.$path), 0777, true, true);
                    }

                    $filePath = $this->file->storeAs(Advertising::UPLOAD_DIR, $filename, 'public');
                    if ($filePath) {
                        // generate resize image and thumbnail
                        
                        // SMALL 
                        $small_path = $path.'/small/';
                        if (!File::isDirectory(public_path('storage/'.$small_path))) {
                            File::makeDirectory(public_path('storage/'.$small_path), 0777, true, true);
                        }

                        $size = explode('x', Advertising::SMALL);
                        list($width, $height) = $size;
                        $image->resize($width, $height);
                        $image->save(public_path('storage/'.$small_path).$filename);

                        // thumbnail
                        // Image::make($path.$filename)
                        //     ->fit(250, 250)
                        //     ->save($resized_path.'thumb_'.$filename);

                    }

                    $advertising->original = $filePath;
                }

                $advertising->save();
            }
        }

        $this->reset();
        $this->showAdvertisingModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Advertising updated successfully!',
        );
    }

    public function deleteAdvertising($advertisingId)
    {
        $advertising = Advertising::findOrFail($advertisingId);
        $advertising->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Advertising deleted successfully!',
        );
    }

    public function closeAdvertisingModal()
    {
        $this->showAdvertisingModal = false;
        $this->reset(
            [
                'advertisingId',
                'segmentId',
                'title',
                'description',
                'start',
                'end',
                'url',
                'advertisingStatus',
            ]
        );
    }

    public function resetFilters()
    {
        $this->reset(['search', 'sort', 'perPage']);
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Advertising::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		// $mediumImageFilePath = $folder . '/medium/' . $fileName;
		// $size = explode('x', Advertising::MEDIUM);
		// list($width, $height) = $size;

		// $mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
		// 	$resizedImage['medium'] = $mediumImageFilePath;
		// }

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Advertising::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Advertising::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $advertisingImage = Advertising::where(['id' => $id])->first();
		$path = 'storage/';
        $small_path = $path.'/small/';
        $medium_path = $path.'/medium/';
        $large_path = $path.'/large/';
        
        // ORIGINAL 
        if (File::exists(public_path($path.$advertisingImage->original))) {
            File::delete(public_path($path.$advertisingImage->original));
		}
		// SMALL
        if (File::exists(public_path($small_path.$advertisingImage->original))) {
            File::delete(public_path($small_path.$advertisingImage->original));
        }   
        // // MEDIUM
		// if (File::exists(public_path($medium_path.$advertisingImage->original))) {
        //     File::delete(public_path($medium_path.$advertisingImage->original));
        // }
        // // LARGE
        // if (File::exists(public_path($large_path.$advertisingImage->original))) {
        //     File::delete(public_path($large_path.$advertisingImage->original));
        // }

        return true;
    }

    public function render()
    {
        if (!$this->search) {
            $advertisings = Advertising::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $advertisings = Advertising::where('title', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.advertising-index',  [
            'advertisings' => $advertisings,
            'segments' => AdvertisingSegment::orderBy('title', $this->sort)->get(),
        ]);
    }
}