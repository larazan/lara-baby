<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App; // To get available locales
use Illuminate\Support\Facades\Config; // Import Config facade
use Livewire\WithPagination;
use Livewire\Component;

class CategoryIndex extends Component
{
    use WithPagination;
    
    public $showCategoryModal = false;
    public $name = [];
    public $categoryId;
    public $parentId;
    public $locales = []; // T o store available locales
    public $currentLocale; // To manage the currently active locale for input fields

    public $catStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'name.*' => 'required|string|min:3', // Validate each translation
    ];

    // This method runs on every request (initial and subsequent)
    public function boot()
    {
        // Ensure locales are always loaded
        $this->locales = array_keys(Config::get('app.locales', [])); // Use Config::get with a default empty array
        
        // Set currentLocale if it's not already set (e.g., on initial load)
        // or if it's somehow become null.
        if (empty($this->currentLocale) || !in_array($this->currentLocale, $this->locales)) {
            $this->currentLocale = App::getLocale();
        }

        // Initialize name array with empty strings for each locale if it's not already populated
        // This handles cases where you open the modal for "create"
        if (empty($this->name)) {
             foreach ($this->locales as $locale) {
                $this->name[$locale] = '';
            }
        }
    }

    // public function mount()
    // {
    //     $this->locales = array_keys(config('app.locales'));
    //     $this->currentLocale = App::getLocale(); // Set default locale
        
    //     // Initialize name array with empty strings for each locale
    //     foreach ($this->locales as $locale) {
    //         $this->name[$locale] = '';
    //     }
    // }

    public function showCreateModal()
    {
        $this->resetInputFields();
        $this->showCategoryModal = true;
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
        Category::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Category deleted successfully!',
        );
    }

    public function createCategory()
    {
        $this->validate();

        // Remove any empty translation inputs to avoid saving empty strings
        $cleanedName = array_filter($this->name, function($value) {
            return !empty($value);
        });
        
        Category::create([
          'name' => $cleanedName,
          'parent_id' => $this->parentId,
          'status' => $this->catStatus
      ]);
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Category created successfully!',
        );
    }

    public function showEditModal($categoryId)
    {
        // $this->reset(['name']);
        $this->categoryId = $categoryId;
        $category = Category::find($categoryId);
        // $this->name = $category->name;
        $this->parentId = $category->parent_id;
        $this->catStatus = $category->status;

        // Get existing translations
        $existingTranslations = $category->getTranslations('name');

        // Initialize $this->name with empty strings for all locales first
        foreach ($this->locales as $locale) {
            $this->name[$locale] = $existingTranslations[$locale] ?? ''; // Use null coalescing
        }
        
        $this->showCategoryModal = true;
    }
    
    public function updateCategory()
    {
        $this->validate();
        
        $category = Category::findOrFail($this->categoryId);
        
        // Remove any empty translation inputs to avoid saving empty strings
         $cleanedName = array_filter($this->name, function($value) {
            return !empty($value);
        });

        $category->update([
            'name' => $cleanedName,
            'parent_id' => $this->parentId,
            'status' => $this->catStatus
        ]);
        $this->reset();
        $this->showCategoryModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Category updated successfully!',
        );
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Category deleted successfully!',
        );
    }

    public function closeCategoryModal()
    {
        $this->showCategoryModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    private function resetInputFields()
    {
        $this->reset('name', 'categoryId');
        // Re-initialize name array with empty strings for each locale
        foreach ($this->locales as $locale) {
            $this->name[$locale] = '';
        }
    }

    public function render()
    {
        if (!$this->search) {
            $categories = Category::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $categories = Category::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.category-index')->with([
            'categories' => $categories,
          
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}