<?php

namespace App\Livewire\Admin;

use App\Models\Babyname;
use App\Models\Country;
use App\Models\Language;
use App\Models\Religion;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class BabynameIndex extends Component
{
    use WithPagination;
    
    public $babynameId;
    public $showBabynameModal = false;
    public $name;
    public $pronounce;
    // public $variations;
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
        $this->showBabynameModal = true;
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
        Babyname::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Babyname deleted successfully!',
        );
    }

    public function createBabyname()
    {
        $this->validate();
        
        Babyname::create([
            'uuid' => Str::uuid(),
          'name' => strtolower($this->name),
          'slug' => Babyname::uniqueSlug($this->name),
          'pronounce' => strtolower($this->pronounce),
          'native_name' => $this->nativeName,
          'meaning' => $this->meaning,
        //   'variations' => $this->variations,
          'gender_id' => $this->genderId,
          'country_id' => $this->countryId,
          'religion_id' => $this->religionId,
          'locale' => $this->locale,
          'status' => $this->catStatus
      ]);
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Babyname created successfully!',
        );
    }

    public function showEditModal($babynameId)
    {
        $this->reset(['name']);
        $this->babynameId = $babynameId;
        $babyname = Babyname::find($babynameId);
        $this->name = $babyname->name;
        $this->pronounce = $babyname->pronounce;
        $this->nativeName = $babyname->native_name;
        $this->meaning = $babyname->meaning;
        // $this->variations = $babyname->variations;
        $this->genderId = $babyname->gender_id;
        $this->countryId = $babyname->country_id;
        $this->religionId = $babyname->religion_id;
        $this->catStatus = $babyname->status;
        $this->locale = $babyname->locale;
        $this->showBabynameModal = true;
    }
    
    public function updateBabyname()
    {
        $this->validate();

        $babyname = Babyname::findOrFail($this->babynameId);
        $babyname->update([
            'name' => strtolower($this->name),
            'slug' => Babyname::uniqueSlug($this->name),
            'pronounce' => strtolower($this->pronounce),
            'native_name' => $this->nativeName,
            'meaning' => $this->meaning,
            // 'variations' => $this->variations,
            'gender_id' => $this->genderId,
            'country_id' => $this->countryId,
            'religion_id' => $this->religionId,
            'locale' => $this->locale,
            'status' => $this->catStatus
        ]);
        $this->reset();
        $this->showBabynameModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Babyname updated successfully!',
        );
    }

    public function deleteBabyname($babynameId)
    {
        $babyname = Babyname::findOrFail($babynameId);
        $babyname->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Babyname deleted successfully!',
        );
    }

    public function closeBabynameModal()
    {
        $this->showBabynameModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $babynames = Babyname::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $babynames = Babyname::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }
        
        return view('livewire.admin.babyname-index')->with([
            'babynames' => $babynames,
            'countries' => Country::OrderBy('id', $this->sort)->get(),
            'languages' => Language::OrderBy('id', $this->sort)->get(),
            'religions' => Religion::OrderBy('id', $this->sort)->get()
        ]);
    }

    public function updateSearch()
    {
        $this->resetPage();
    }
}
