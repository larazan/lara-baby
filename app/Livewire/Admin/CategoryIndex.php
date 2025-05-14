<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class CategoryIndex extends Component
{
    use WithPagination;
    
    public $showCategoryModal = false;
    public $name;
    public $categoryId;
    public $parentId;

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

    protected function rules() 
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    public function showCreateModal()
    {
        $this->reset();
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
        
        Category::create([
          'name' => $this->name,
          'slug' => Str::slug($this->name),
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
        $this->reset(['name']);
        $this->categoryId = $categoryId;
        $category = Category::find($categoryId);
        $this->name = $category->name;
        $this->parentId = $category->parent_id;
        $this->catStatus = $category->status;
        $this->showCategoryModal = true;
    }
    
    public function updateCategory()
    {
        $this->validate();

        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name,
            'slug'     => Str::slug($this->name),
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

    public function updateSearch()
    {
        $this->resetPage();
    }
}