<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use App\Mail\ReplyContactMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
   
    public $showAnswerModal = false;
    public $showContactModal = false;
    public $contactId;
    public $name;
    public $email;
    public $subject;
    public $message;
    public $reply;
    public $feedback;
    public $opened;
    public $openedStatus = [
        0 => 'no',
        1 => 'yes',
    ];

    public $contactStatus = 'inactive';
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
            'firstName' => 'required|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'contactStatus' => 'required',
        ]);
    }

    public function showCreateReplyModal()
    {
        $this->reset();
        $this->showAnswerModal = true;
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
        Contact::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Contact deleted successfully!',
        );
    }

    public function createReply()
    {
        $this->validate();
        
        Contact::find($this->contactId)->update(
            [
                'reply' => $this->reply, 
                'reply_at' => Carbon::now()
            ]);

        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Category created successfully!',
        );
    }

    public function showEditModal($contactId)
    {
        // $this->reset(['name']);
        $this->contactId = $contactId;
        $contact = Contact::find($contactId);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
        $this->reply = $contact->reply;
        
        $this->showContactModal = true;
    }

    public function loadContact()
    {
        $contact = Contact::findOrFail($this->contactId);
        $this->name = $contact->name;
        $this->message = $contact->message;
        $this->openedStatus = $contact->opened;
        $this->contactStatus = $contact->status;
    }

    public function deleteContact($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Contact deleted successfully!',
        );
    }

    public function closeContactModal()
    {
        $this->showContactModal = false;
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.contact-index')->with([
            'contacts' => Contact::liveSearch('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage)
        ]);
    }

    // Reply

    public function showReplyModal($contactId)
    {
        $this->showAnswerModal = true;

        $this->contactId = $contactId;
        $contact = Contact::findOrFail($this->contactId);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->message = $contact->message;
        
    }

    public function replyContact()
    {
        $contact = Contact::findOrFail($this->contactId);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->message = $contact->message;
        // save reply
        $contact->reply = $this->reply;
        $contact->feedback = 1;
        $contact->reply_at = Carbon::now();
        $contact->save();
        // email reply
        Mail::to($this->email)->send(new ReplyContactMail($this->name, $this->email, $this->message, $this->reply));
    
        $this->reset();
        $this->showAnswerModal = false;
        $this->dispatch(
            'banner-message', 
            style: 'success',
            message: 'Reply created!',
        );
    }

    public function closeReplyModal()
    {
        $this->showAnswerModal = false;
        $this->reset();
        $this->resetValidation();
    }
}