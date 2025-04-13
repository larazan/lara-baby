<?php

namespace App\Livewire;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class ShowPermissionComponent extends Component
{
    protected $listeners = ['showModal' => 'showModal'];

    public $showModal = false;
    public $permission;

    public function render()
    {
        return view('livewire.show-permission-component'. [
            'permission' => $this->permission,
            'roles' => isset($this->permission) ? $this->permission->roles : null,
        ]);
    }

    public function showModal(Permission $permission){
        $this->permission = $permission;
        $this->showModal = true;
    }
}