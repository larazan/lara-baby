<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleSwitch extends Component
{
    public Model $model;
    public string $field;
    public bool $isActive;

    public function mount(Model $model, string $field)
    {
        $this->model = $model;
        $this->field = $field;
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function toggle()
    {
        $this->isActive = !$this->isActive;
        $this->model->setAttribute($this->field, $this->isActive)->save();

        session()->flash('status', 'Status updated successfully!');
    }

    // public function updating($field, $value)
    // {
    //     $this->model->setAttribute($this->field, $value)->save();
    // }

    public function render()
    {
        return view('livewire.toggle-switch');
    }
}
