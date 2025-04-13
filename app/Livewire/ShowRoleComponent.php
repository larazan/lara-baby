<?php

namespace App\Livewire;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class ShowRoleComponent extends Component
{
    protected $listeners = ['showModal' => 'showModal', 'refreshComponent' => '$refresh'];

    public $showModal = false;
    public $role;

    public function render()
    {
        return view('livewire.show-role-component', [
            'role' => $this->role,
            'permissions' => isset($this->role) ? $this->role->permissions : null,
            'users' => isset($this->role) ? $this->role->users()->paginate(10)  : null,
        ]);
    }

    public function showModal(Role $role){
        
        $this->role = $role;
        $this->showModal = true;
    }

    public function removeUserRole(User $user){
        $user->removeRole($this->role);
        $this->emitSelf('refreshComponent');
    }
}