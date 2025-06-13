<?php

namespace App\Livewire\Admin\Activity;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Material;
use App\Models\Step;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Intervention\Image\Image;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;

    public $showMessage = false;
    public $title;
    public $body;
    public $locale;
    public $status;
    public $activityId;
    public $tags = [];
    public $categoryId;
    public $file;
    public $author;
    public $oldImage;
    public $categoryItem;
    public $metaDesc;
    public $activityStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $sort = 'asc';

    protected function rules() 
    {
        return [
            'title' => 'required|min:3',
            // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }

    public function mount($activityId)
    {
        // $this->activity = Activity::findOrFail($activity);
        $this->activityId = $activityId;
        $activity = Activity::find($activityId);
        $this->categoryId = $activity->category_id;
        $this->title = $activity->title;
        $this->body = $activity->body;
        $this->locale = $activity->locale;
        $this->author = $activity->author_id;
        $this->oldImage = $activity->small;
        $this->activityStatus = $activity->status;
        $this->metaDesc = $activity->meta_description;
    }

    public function showEditModal($activityId)
    {
        $this->reset(['title']);
        $this->activityId = $activityId;
        $activity = Activity::find($activityId);
        $this->categoryId = $activity->category_id;
        $this->title = $activity->title;
        $this->body = $activity->body;
        $this->author = $activity->author_id;
        $this->oldImage = $activity->small;
        $this->activityStatus = $activity->status;
        $this->metaDesc = $activity->meta_description;
    }
    
    public function updateActivity()
    {
        $this->validate();

        $activity = Activity::findOrFail($this->activityId);
  
        $new = Str::slug($this->title) . '_' . time();
        
        if ($this->activityId) {
            if ($activity) {

                $activity->category_id = $this->categoryId;
                $activity->author_id = isset($this->author) ? $this->author : Auth::user()->id;
                $activity->title = $this->title;
                $activity->slug = Str::slug($this->title);
                $activity->rand_id = Str::random(10);
                $activity->body = $this->body;
                $activity->locale = $this->locale;
                $activity->status = $this->activityStatus;
                $activity->meta_description = $this->metaDesc;

                if (!empty($this->file)) {
                    // delete image
                    $this->deleteImage($this->activityId);

                    $filename = $new . '_' . $this->file->getClientOriginalName();
                    
                    //
                    $path = Activity::UPLOAD_DIR;
                    $manager = new ImageManager(Driver::class);
                    $image = $manager->read($this->file);

                    // check directory
                    if (!File::isDirectory(public_path('storage/'.$path))) {
                        File::makeDirectory(public_path('storage/'.$path), 0777, true, true);
                    }

                    $filePath = $this->file->storeAs(Activity::UPLOAD_DIR, $filename, 'public');
                    // $upload = $this->file->move(storage_path($path), $filename);
                    // $upload = $image->save(public_path('storage/'.$path).'/'.$filename);
                    
                    $activity->original = $filePath;
                }

                $activity->save();
            }
        }

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Activity updated successfully!',
        );
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function deleteImage($id = null) {
        $activityImage = Activity::where(['id' => $id])->first();
		$path = 'storage/';
        $small_path = $path.'/small/';
        $medium_path = $path.'/medium/';
        $large_path = $path.'/large/';

        // ORIGINAL 
        if (File::exists(public_path($path.$activityImage->original))) {
            File::delete(public_path($path.$activityImage->original));
		}
		     
        return true;
    }

    public function categoryAdd()
    {   
        Category::create([
          'name' => $this->categoryItem,
          'slug' => Str::slug($this->categoryItem),
        ]);

        $this->reset('categoryItem');
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Category created successfully!',
        );
    }

    public function render()
    {
        return view('livewire.admin.activity.edit')->with([
            'categories' => Category::OrderBy('name', $this->sort)->get(),
            'authors' => User::OrderBy('id', $this->sort)->get(),
            'languages' => Language::OrderBy('id', $this->sort)->get(),
        ]);
    }
}
