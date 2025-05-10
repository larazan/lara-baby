<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\User;
use App\Models\CategoryArticle;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Laravel\Facades\Image;
use Livewire\WithFileUploads;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Intervention\Image\Image;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Create extends Component
{
    use WithFileUploads;

    public $showMessage = false;
    public $title;
    public $body;
    public $locale;
    public $status;
    public $articleId;
    public $articleTags;
    public $tags = [];
    public $categoryId;
    public $file;
    public $author;
    public $url;
    public $embedUrl;
    public $publishedAt;
    public $oldImage;
    public $categoryItem;
    public $metaTitle;
    public $metaKeyword;
    public $metaDesc;
    public $articleStatus = 'inactive';
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

    public function mount()
    {
        $this->publishedAt = today()->format('Y-m-d');
        $this->tags = isset($this->articleTags) ? explode(',', $this->articleTags) : [];
    }

    public function createArticle()
    {
        // dd($this->tags);
        // dd($this->body);
        $this->validate();
  
        $new = Str::slug($this->title) . '_' . time();

        $article = new Article();
        $article->category_id = $this->categoryId;
        $article->author_id = isset($this->author) ? $this->author : Auth::user()->id;
        $article->title = $this->title;
        $article->slug = Str::slug($this->title);
        $article->rand_id = Str::random(10);
        $article->body = $this->body;
        $article->locale = $this->locale;
        $article->article_tags = implode(',', $this->tags);
        $article->author_id = $this->author;
        $article->original_url = $this->url;
        // $article->embed_url = $this->embedUrl;
        $article->published_at = $this->publishedAt;
        $article->status = $this->articleStatus;
        $article->meta_title = $this->metaTitle;
        $article->meta_keyword = $this->metaKeyword;
        $article->meta_description = $this->metaDesc;

        if (!empty($this->file)) {
            $filename = $new . '_' . $this->file->getClientOriginalName();
            
            // do upload original
            // $filePath = $this->file->storeAs(Article::UPLOAD_DIR, $filename, 'public');

            //
            $path = Article::UPLOAD_DIR;
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($this->file);

            // check directory
            if (!File::isDirectory(public_path('storage/'.$path))) {
                File::makeDirectory(public_path('storage/'.$path), 0777, true, true);
            }

            $filePath = $this->file->storeAs(Article::UPLOAD_DIR, $filename, 'public');
            // $upload = $this->file->move(storage_path($path), $filename);
            // $upload = $image->save(storage_path($path).'/'.$filename);
            if ($filePath) {
                // generate resize image and thumbnail
                // $resizedImage = $this->_resizeImage($image, $filename, Article::UPLOAD_DIR);
                
                // SMALL 
                $small_path = $path.'/small/';
                if (!File::isDirectory(public_path('storage/'.$small_path))) {
                    File::makeDirectory(public_path('storage/'.$small_path), 0777, true, true);
                }

                $size = explode('x', Article::SMALL);
                list($width, $height) = $size;
                $image->resize($width, $height);
                $image->save(public_path('storage/'.$small_path).$filename);

                // MEDIUM
                $medium_path = $path.'/medium/';
                if (!File::isDirectory(public_path('storage/'.$medium_path))) {
                    File::makeDirectory(public_path('storage/'.$medium_path), 0777, true, true);
                }

                $size = explode('x', Article::MEDIUM);
                list($width, $height) = $size;
                $image->resize($width, $height);
                $image->save(public_path('storage/'.$medium_path).$filename);

                // LARGE
                // $large_path = $path.'/large/';
                // if (!File::isDirectory(public_path('storage/'.$large_path))) {
                //     File::makeDirectory(public_path('storage/'.$large_path), 0777, true, true);
                // }

                // $size = explode('x', Article::LARGE);
                // list($width, $height) = $size;
                // $image->resize($width, $height);
                // $image->save(public_path('storage/'.$large_path).$filename);

                // THUMBNAIL
                // $thumbnail_path = $path.'/thumbnail/';
                // if (!File::isDirectory(public_path('storage/'.$thumbnail_path))) {
                //     File::makeDirectory(public_path('storage/'.$thumbnail_path), 0777, true, true);
                // }

                // $image->cover(250, 250);
                // $image->save(public_path('storage/'.$thumbnail_path).$filename);

            }

            // save name to db
            $article->original = $filePath;
            // $article->small = $resizedImage['small'];
            // $article->medium = $resizedImage['medium'];
        }


        $article->save();

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Article created successfully!',
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
		$size = explode('x', Article::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		$mediumImageFilePath = $folder . '/medium/' . $fileName;
		$size = explode('x', Article::MEDIUM);
		list($width, $height) = $size;

		$mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
			$resizedImage['medium'] = $mediumImageFilePath;
		}

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Article::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Article::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function categoryAdd()
    {   
        CategoryArticle::create([
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
        return view('livewire.admin.article.create')->with([
            'categories' => CategoryArticle::OrderBy('name', $this->sort)->get(),
            'authors' => User::OrderBy('id', $this->sort)->get(),
            'languages' => Language::OrderBy('id', $this->sort)->get(),
        ]);
    }
}