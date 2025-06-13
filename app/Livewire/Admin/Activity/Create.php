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
use Illuminate\Support\Facades\DB;

class Create extends Component
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

    public $inputs;
    public $items;

    protected function rules() 
    {
        return [
            'title' => 'required|min:3',
            // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
    }

    public function mount()
    {
        $this->fill([
            'inputs' => collect([['name' => '', 'qty' => '']])
        ]);

        $this->fill([
            'items' => collect([['title' => '', 'body' => '', 'file' => '' ]])
        ]);
    }

    public function remove($key)
    {
        // dd($key);
        $this->inputs->pull($key);
    }

    public function add()
    {
        $this->inputs->push(['name' => '', 'qty' => '']);
    }

    public function addItem()
    {
        $this->items->push(['title' => '', 'body' => '', 'file' => '' ]);
    }

    public function removeItem($index)
    {
        $this->items->pull($index);
    }

    public function updateItem($index, $item)
    {
        $this->items[$index] = $item;
    }

    public function createActivity()
    {
        // dd($this->tags);
        // dd($this->body);
        $this->validate();
  
        
        $activity = DB::transaction(function () {
            // $activityInitial = Activity::create([
                //     'category_id' => $this->categoryId,
                //     'author_id' => isset($this->author) ? $this->author : Auth::user()->id,
                //     'title' => $this->title,
                //     'slug' => Str::slug($this->title),
                //     'rand_id' => Str::random(10),
                //     'body' => $this->body,
                //     'locale' => $this->locale,
                //     'status' => $this->activityStatus,
                //     'meta_description' => $this->metaDesc,
                // ]);
                
            $new = Str::slug($this->title) . '_' . time();
                
            $activityInitial = new Activity();
            $activityInitial->category_id = $this->categoryId;
            $activityInitial->author_id = isset($this->author) ? $this->author : Auth::user()->id;
            $activityInitial->title = $this->title;
            $activityInitial->slug = Str::slug($this->title);
            $activityInitial->rand_id = Str::random(10);
            $activityInitial->body = $this->body;
            $activityInitial->locale = $this->locale;
            $activityInitial->status = $this->activityStatus;
            $activityInitial->meta_description = $this->metaDesc;

            if (!empty($this->file)) {
                $filename = $new . '_' . $this->file->getClientOriginalName();
                
                // do upload original
                // $filePath = $this->file->storeAs(Activity::UPLOAD_DIR, $filename, 'public');

                //
                $path = Activity::UPLOAD_DIR;
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($this->file);

                // check directory
                if (!File::isDirectory(public_path('storage/'.$path))) {
                    File::makeDirectory(public_path('storage/'.$path), 0777, true, true);
                }

                $filePath = $this->file->storeAs(Activity::UPLOAD_DIR, $filename, 'public');

                // save name to db
                $activityInitial->original = $filePath;
            }

            $activityInitial->save();
            
            // material
            foreach ($this->inputs as $input) {
                Material::create([
                    'activity_id' => $activityInitial->id,
                    'name' => $input['name'],
                    'qty' => $input['qty'],
                ]);
            }

            return $activityInitial;
        });

        if ($activity) {
            $this->dispatch(
                'banner-message', 
                style: 'success',
                message: 'Activity created successfully!',
            );
        } else {
            $this->dispatch(
                'banner-message', 
                style: 'danger',
                message: 'Activity created failed!',
            );
        }
        
        $this->reset();
        
    }

    public function resetFilters()
    {
        $this->reset();
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
        return view('livewire.admin.activity.create')->with([
            'categories' => Category::OrderBy('name', $this->sort)->get(),
            'authors' => User::OrderBy('id', $this->sort)->get(),
            'languages' => Language::OrderBy('id', $this->sort)->get(),
        ]);
    }
}
