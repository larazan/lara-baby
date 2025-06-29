<?php

namespace App\Livewire\Admin\Activity;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'desc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

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
        // soft delete
        Activity::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Activity deleted successfully!',
        );
    }

    public function deleteActivity($activityId)
    {
        $activity = Activity::findOrFail($activityId);
        $activity->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Activity deleted successfully!',
        );
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $activities = Activity::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $activities = Activity::where('title', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.activity.index')->with([
            'activities' => $activities,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function gotoEdit($activityId)
    {
        return redirect('/admin/activity/'.$activityId.'/update');
    }
}
