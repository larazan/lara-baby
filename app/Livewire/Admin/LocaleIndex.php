<?php

namespace App\Livewire\Admin;

use App\Models\Language;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class LocaleIndex extends Component
{
    use WithPagination;
    
    public $showLanguageModal = false;
    public $code;
    public $name;
    public $icon;
    public $rtl;
    public $rtlOption = [
        true => 'yes',
        false => 'no'
    ];
    public $languageId;

    public $langStatus = 'inactive';
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
        $this->showLanguageModal = true;
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
        Language::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Language deleted successfully!',
        );
    }

    public function createLanguage()
    {
        $this->validate();
        
        Language::create([
          'code' => $this->code,
          'name' => $this->name,
          'rtl' => $this->rtl,
          'status' => $this->langStatus
      ]);
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Language created successfully!',
        );
    }

    public function showEditModal($languageId)
    {
        $this->reset(['name']);
        $this->languageId = $languageId;
        $language = Language::find($languageId);
        $this->code = $language->code;
        $this->name = $language->name;
        $this->rtl = $language->rtl;
        $this->langStatus = $language->status;
        $this->showLanguageModal = true;
    }
    
    public function updateLanguage()
    {
        $this->validate();

        $language = Language::findOrFail($this->languageId);
        $language->update([
            'code' => $this->code,
            'name' => $this->name,
            'rtl' => $this->rtl,
            'status' => $this->langStatus
        ]);
        $this->reset();
        $this->showLanguageModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Language updated successfully!',
        );
    }

    public function deleteLanguage($languageId)
    {
        $language = Language::findOrFail($languageId);
        $language->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Language deleted successfully!',
        );
    }

    public function closeLanguageModal()
    {
        $this->showLanguageModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $languages = Language::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $languages = Language::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.locale-index')->with([
            'languages' => $languages,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
