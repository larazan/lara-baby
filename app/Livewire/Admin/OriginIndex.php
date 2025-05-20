<?php

namespace App\Livewire\Admin;

use App\Models\Origin;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class OriginIndex extends Component
{
    use WithPagination;
    
    public $showOriginModal = false;
    public $name;
    public $originId;

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
        $this->showOriginModal = true;
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
        Origin::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Origin deleted successfully!',
        );
    }

    public function createOrigin()
    {
        $this->validate();
        
        Origin::create([
          'name' => $this->name,
          'status' => $this->catStatus
      ]);
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Origin created successfully!',
        );
    }

    public function showEditModal($originId)
    {
        $this->reset(['name']);
        $this->originId = $originId;
        $origin = Origin::find($originId);
        $this->name = $origin->name;
        $this->catStatus = $origin->status;
        $this->showOriginModal = true;
    }
    
    public function updateOrigin()
    {
        $this->validate();

        $origin = Origin::findOrFail($this->originId);
        $origin->update([
            'name' => $this->name,
            'status' => $this->catStatus
        ]);
        $this->reset();
        $this->showOriginModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Origin updated successfully!',
        );
    }

    public function deleteOrigin($originId)
    {
        $origin = Origin::findOrFail($originId);
        $origin->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Origin deleted successfully!',
        );
    }

    public function closeOriginModal()
    {
        $this->showOriginModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $origins = Origin::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $origins = Origin::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.origin-index')->with([
            'origins' => $origins,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
