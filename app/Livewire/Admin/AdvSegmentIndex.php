<?php

namespace App\Livewire\Admin;

use App\Models\AdvertisingSegment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;

class AdvSegmentIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $showAdvertisingSegmentModal = false;
    public $showAdvertisingSegmentDetailModal = false;
    
    public $title;
    public $size;

    public $file;
    public $segmentId;
    public $oldImage;
    public $segmentStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected function rules() 
    {
        return [
            'title' => 'required|min:3',
            // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }

    public function showCreateModal()
    {
        $this->showAdvertisingSegmentModal = true;
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
        AdvertisingSegment::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Advertising Segment deleted successfully!',
        );
    }

    public function createAdvertisingSegment()
    {
        $this->validate();
  
        $new = Str::slug($this->title) . '_' . time();

        $segment = new AdvertisingSegment();
        $segment->title = $this->title;
        $segment->size = $this->size;
        $segment->status = $this->segmentStatus;

        if (!empty($this->file)) {
            $filename = $new . '.' . $this->file->getClientOriginalName();
            $filePath = $this->file->storeAs(AdvertisingSegment::UPLOAD_DIR, $filename, 'public');

            $segment->original = $filePath;
        }

        $segment->save();

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Advertising Segment created successfully!',
        );
    }

    public function showEditModal($segmentId)
    {
        $this->reset(['name']);
        $this->segmentId = $segmentId;
        $segment = AdvertisingSegment::find($segmentId);
        $this->title = $segment->title;
        $this->size = $segment->size;
        $this->oldImage = $segment->original;
        $this->segmentStatus = $segment->status;
        $this->showAdvertisingSegmentModal = true;
    }
    
    public function updateAdvertisingSegment()
    {
        $this->validate();
        $segment = AdvertisingSegment::findOrFail($this->segmentId);
  
        $new = Str::slug($this->title) . '_' . time();
        
        if ($this->segmentId) {
            if ($segment) {

                // $segment = AdvertisingSegment::where('id', $this->segmentId)->first();
                $segment->title = $this->title;
                $segment->size = $this->size;
                $segment->status = $this->segmentStatus;

                if (!empty($this->file)) {
                    // delete image
			        $this->deleteImage($this->segmentId);

                    $filename = $new . '.' . $this->file->getClientOriginalName();
                    $filePath = $this->file->storeAs(AdvertisingSegment::UPLOAD_DIR, $filename, 'public');

                    $segment->original = $filePath;
                }

                $segment->save();
            }
        }

        $this->reset();
        $this->showAdvertisingSegmentModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Advertising Segment updated successfully!',
        );
    }

    public function deleteAdvertisingSegment($segmentId)
    {
        $segment = AdvertisingSegment::findOrFail($segmentId);
        $segment->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Advertising Segment deleted successfully!',
        );
    }

    public function closeAdvertisingSegmentModal()
    {
        $this->showAdvertisingSegmentModal = false;
        $this->reset(
            [
                'segmentId',
                'title',
                'size',
                'segmentStatus',
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
		// $smallImageFilePath = $folder . '/small/' . $fileName;
		// $size = explode('x', AdvertisingSegment::SMALL);
		// list($width, $height) = $size;

		// $smallImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
		// 	$resizedImage['small'] = $smallImageFilePath;
		// }
		
        // MEDIUM
		// $mediumImageFilePath = $folder . '/medium/' . $fileName;
		// $size = explode('x', AdvertisingSegment::MEDIUM);
		// list($width, $height) = $size;

		// $mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
		// 	$resizedImage['medium'] = $mediumImageFilePath;
		// }

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', AdvertisingSegment::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', AdvertisingSegment::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $segmentImage = AdvertisingSegment::where(['id' => $id])->first();
		$path = 'storage/';

        if (Storage::exists($path.$segmentImage->original)) {
            Storage::delete($path.$segmentImage->original);
		}
		
        // if (Storage::exists($path.$segmentImage->small)) {
        //     Storage::delete($path.$segmentImage->small);
        // }   

		// if (Storage::exists($path.$segmentImage->medium)) {
        //     Storage::delete($path.$segmentImage->medium);
        // } 

        // if (Storage::exists($path.$segmentImage->large)) {
        //     Storage::delete($path.$segmentImage->large);
        // } 

        return true;
    }

    public function render()
    {
        return view('livewire.admin.adv-segment-index', [
            'segments' => AdvertisingSegment::liveSearch('title', $this->search)->orderBy('title', $this->sort)->paginate($this->perPage),
        ]);
    }
}