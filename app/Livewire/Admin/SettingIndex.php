<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SettingIndex extends Component
{
    use WithFileUploads;

    public $showSettingModal = false;

    public $title;
    public $description;
    public $metaTitle;
    public $metaDescription; 
    public $metaKeyword;
    public $file;
    public $oldImage;
    public $address;
    public $phone;
    public $email; 
    public $twitter; 
    public $facebook; 
    public $instagram; 
    public $pinterest; 
    public $sizeTol = Setting::MEDIUM;

    protected function rules() 
    {
        return [
            'title' => 'required|min:3',
        // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }

    public function mount()
    {
        $title = Setting::where(['key' => 'title'])->first();
        $meta_title = Setting::where(['key' => 'meta_title'])->first();
        $meta_description = Setting::where(['key' => 'meta_description'])->first();
        $meta_keyword = Setting::where(['key' => 'meta_keyword'])->first();
        $email = Setting::where(['key' => 'email'])->first();
        $phone = Setting::where(['key' => 'phone'])->first();
        $address = Setting::where(['key' => 'address'])->first();
        $twitter = Setting::where(['key' => 'twitter'])->first();
        $facebook = Setting::where(['key' => 'facebook'])->first();
        $instagram = Setting::where(['key' => 'instagram'])->first();
        $pinterest = Setting::where(['key' => 'pinterest'])->first();

        $this->title = isset($title->value) ? $title->value : '';
        $this->metaTitle = isset($meta_title->value) ? $meta_title->value : '';
        $this->metaDescription = isset($meta_description->value) ? $meta_description->value : '';
        $this->metaKeyword = isset($meta_keyword->value) ? $meta_keyword->value : '';
        $this->email = isset($email->value) ? $email->value : '';
        $this->phone = isset($phone->value) ? $phone->value : '';
        $this->address = isset($address->value) ? $address->value : '';
        $this->twitter = isset($twitter->value) ? $twitter->value : '';
        $this->facebook = isset($facebook->value) ? $facebook->value : '';
        $this->instagram = isset($instagram->value) ? $instagram->value : '';
        $this->pinterest = isset($pinterest->value) ? $pinterest->value : '';
                
    }


    public function updatePhoto()
    {
        $setting = Setting::findOrFail($this->settingId);
        $this->validate();
  
        $new = 'logo_' . time();
        $filename = $new . '.' . $this->file->getClientOriginalName();
        
        if ($this->settingId) {
            if ($setting) {
               // delete image
			    $this->deleteImage($this->settingId);
                $filePath = $this->file->storeAs(Setting::UPLOAD_DIR, $filename, 'public');
                $resizedImage = $this->_resizeImage($this->file, $filename, Setting::UPLOAD_DIR);

                $setting->update([
                    'original' => $filePath,
                    'medium' => $resizedImage['medium'],
                    'small' => $resizedImage['small'],
                ]);
                
            }
        }

        $this->reset();
        $this->showSettingModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Logo updated successfully!',
        );
    }

    public function updateSetting()
    {
        $this->validate();

        DB::table('settings')->updateOrInsert(['key' => 'title'], [
            'value' => $this->title,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'meta_title'], [
            'value' => $this->metaTitle,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'meta_description'], [
            'value' => $this->metaDescription,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'meta_keyword'], [
            'value' => $this->metaKeyword,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'address'], [
            'value' => $this->address,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'phone'], [
            'value' => $this->phone,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'email'], [
            'value' => $this->email,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'twitter'], [
            'value' => $this->twitter,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'facebook'], [
            'value' => $this->facebook,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'instagram'], [
            'value' => $this->instagram,
        ]);

        DB::table('settings')->updateOrInsert(['key' => 'pinterest'], [
            'value' => $this->pinterest,
        ]);

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Setting updated successfully!',
        );
    }

    public function resetFilters()
    {
        $this->reset();
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Setting::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		$mediumImageFilePath = $folder . '/medium/' . $fileName;
		$size = explode('x', Setting::MEDIUM);
		list($width, $height) = $size;

		$mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
			$resizedImage['medium'] = $mediumImageFilePath;
		}

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Setting::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Setting::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $articleImage = Setting::where(['id' => $id])->first();
		$path = 'storage/';

        if (Storage::exists($path.$articleImage->original)) {
            Storage::delete($path.$articleImage->original);
		}
		
        if (Storage::exists($path.$articleImage->small)) {
            Storage::delete($path.$articleImage->small);
        }   

		if (Storage::exists($path.$articleImage->medium)) {
            Storage::delete($path.$articleImage->medium);
        }

             
        return true;
    }

    public function render()
    {
        return view('livewire.admin.setting-index');
    }
}