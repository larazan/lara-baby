<?php

namespace App\Livewire\Admin;

use App\Models\Namelist;
use App\Models\Country;
use App\Models\Religion;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class NamelistIndex extends Component
{
    use WithPagination;
    
    public $namelistId;
    public $showNamelistModal = false;
    public $fullName;
    public $nativeName;
    public $meaning;
    public $genderId;
    public $genders = [
        1 => 'male',
        2 => 'female',
        3 => 'unisex',
    ];
    public $countryId;
    public $religionId;
    public $locale;

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
        $this->showNamelistModal = true;
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
        Namelist::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Namelist deleted successfully!',
        );
    }

    public function createNamelist()
    {
        $this->validate();
        
        Namelist::create([
          'full_name' => strtolower($this->fullName),
          'native_name' => $this->nativeName,
          'meaning' => $this->meaning,
          'gender_id' => $this->genderId,
          'country_id' => $this->countryId,
          'religion_id' => $this->religionId,
          'status' => $this->catStatus
      ]);
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Namelist created successfully!',
        );
    }

    public function showEditModal($namelistId)
    {
        $this->reset(['full_name']);
        $this->namelistId = $namelistId;
        $namelist = Namelist::find($namelistId);
        $this->fullName = $namelist->full_name;
        $this->nativeName = $namelist->native_name;
        $this->meaning = $namelist->meaning;
        $this->genderId = $namelist->gender_id;
        $this->countryId = $namelist->country_id;
        $this->religionId = $namelist->religion_id;
        $this->catStatus = $namelist->status;
        $this->showNamelistModal = true;
    }
    
    public function updateNamelist()
    {
        $this->validate();

        $namelist = Namelist::findOrFail($this->namelistId);
        $namelist->update([
            'full_name' => strtolower($this->fullName),
          'pronounce' => $this->pronounce,
          'native_name' => $this->nativeName,
          'meaning' => $this->meaning,
          'gender_id' => $this->genderId,
          'country_id' => $this->countryId,
          'religion_id' => $this->religionId,
          'status' => $this->catStatus
        ]);
        $this->reset();
        $this->showNamelistModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Namelist updated successfully!',
        );
    }

    public function deleteNamelist($namelistId)
    {
        $namelist = Namelist::findOrFail($namelistId);
        $namelist->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Namelist deleted successfully!',
        );
    }

    public function closeNamelistModal()
    {
        $this->showNamelistModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $namelists = Namelist::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $namelists = Namelist::where('full_name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.namelist-index')->with([
            'namelists' => $namelists,
            'countries' => Country::OrderBy('id', $this->sort)->get(),
            'religions' => Religion::OrderBy('id', $this->sort)->get()
        ]);
    }

    public function updateSearch()
    {
        $this->resetPage();
    }
}
