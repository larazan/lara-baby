<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class MaterialComponent extends Component
{
    public $index;
    public $name;
    public $qty;

    public function mount($index, $name, $qty)
    {
        $this->index = $index;
        $this->name = $name;
        $this->qty = $qty;
    }

    public function updatedMaterial()
    {
        $this->emitUp('updateMaterial', $this->index, $this->name, $this->qty);
    }

    public function render()
    {
        return view('livewire.admin.material-component');
    }
}
