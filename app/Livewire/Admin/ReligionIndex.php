<?php

namespace App\Livewire\Admin;

use App\Models\Religion;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ReligionIndex extends Component
{
    use WithPagination;
    
    public $showReligionModal = false;

    #[Validate('required|min:3')] 
    public $name;
    public $religionId;

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

    public function showCreateModal()
    {
        $this->reset();
        $this->showReligionModal = true;
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
        Religion::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Religion deleted successfully!',
        );
    }

    public function createReligion()
    {
        $this->validate();
        
        Religion::create([
          'name' => $this->name,  
        ]);

        $this->reset('name');
        
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Religion created successfully!',
        );
    }

    public function showEditModal($religionId)
    {
        $this->reset(['name']);
        $this->religionId = $religionId;
        $religion = Religion::find($religionId);
        $this->name = $religion->name;
        // $this->catStatus = $religion->status;
        $this->showReligionModal = true;
    }
    
    public function updateReligion()
    {
        $this->validate();

        $religion = Religion::findOrFail($this->religionId);
        $religion->update([
            'name' => $this->name,
            // 'status' => $this->catStatus
        ]);
        $this->reset('name');
        $this->showReligionModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Religion updated successfully!',
        );
    }

    public function deleteReligion($religionId)
    {
        $religion = Religion::findOrFail($religionId);
        $religion->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Religion deleted successfully!',
        );
    }

    public function closeReligionModal()
    {
        $this->showReligionModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.religion-index')->with([
            'religions' => Religion::liveSearch('name', $this->search)->orderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }
}
