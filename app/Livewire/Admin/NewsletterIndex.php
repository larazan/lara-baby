<?php

namespace App\Livewire\Admin;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterIndex extends Component
{
    public $showNewsletterModal = false;
    public $email;
    public $newsletterId;
    public $subscribeStatus = 'inactive';
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
            'email' => 'required',
        ];
    }

    public function updateNewsletter()
    {
        $this->validate();

        $newsletter = Newsletter::findOrFail($this->newsletterId);
        $newsletter->update([
            'email' => $this->email,
            'status' => $this->catStatus
        ]);
        $this->reset();
        $this->showNewsletterModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Newsletter updated successfully!',
        );
    }

    public function deleteNewsletter($newsletterId)
    {
        $newsletter = Newsletter::findOrFail($newsletterId);
        $newsletter->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Newsletter deleted successfully!',
        );
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
        Newsletter::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Email deleted successfully!',
        );
    }

    public function render()
    {
        return view('livewire.admin.newsletter-index', [
            'subscribers' => Newsletter::liveSearch('title', $this->search)->orderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }
}