<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class StepComponent extends Component
{
    use WithFileUploads;

    // public $items;

    // public function mount()
    // {
    //     $this->fill([
    //         'items' => collect([['title' => '', 'body' => '', 'file' => '' ]])
    //     ]);
    // }

    // public function addItem()
    // {
    //     $this->items->push(['title' => '', 'body' => '', 'file' => '' ]);
    // }

    // public function removeItem($index)
    // {
    //     $this->items->pull($index);
    // }

    // public function updateItem($index, $item)
    // {
    //     $this->items[$index] = $item;
    // }

    public function render()
    {
        return view('livewire.admin.step-component');
    }
}
