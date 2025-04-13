<?php

namespace App\Livewire\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class PermissionIndex extends Component
{
    use WithPagination;

    public $showPermissionModal = false;
    public $name;
    public $permissionId;

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    public $permissionStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    protected function rules() 
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    public function showCreateModal()
    {
        $this->showPermissionModal = true;
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
        Permission::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Permission deleted successfully!',
        );
    }

    public function createPermission()
    {
        $this->validate();
        
        Permission::create([
          'name' => $this->name,
        ]);

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Permission created successfully!',
        );
    }

    public function showEditModal($permissionId)
    {
        $this->reset(['name']);
        $this->permissionId = $permissionId;
        $permission = Permission::find($permissionId);
        $this->name = $permission->name;
        // $this->permissionStatus = $permission->status;
        $this->showPermissionModal = true;
    }
    
    public function updatePermission()
    {
        $this->validate();

        $permission = Permission::findOrFail($this->permissionId);
        $permission->update([
            'name' => $this->name,
        ]);

        $this->reset();
        $this->showPermissionModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Permission updated successfully!',
        );
    }

    public function deletePermission($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Permission deleted successfully!',
        );
    }

    public function closePermissionModal()
    {
        $this->showPermissionModal = false;
        $this->reset([
            'name',
            'permissionId',
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'sort', 'perPage']);
    }

    public function render()
    {
        return view('livewire.admin.permission-index')->with([
            'permissions' => Permission::OrderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }
}