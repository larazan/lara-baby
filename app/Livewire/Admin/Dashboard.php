<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use App\Models\Babyname;
use App\Models\Namelist;
use App\Models\Contact;
use App\Models\Newsletter;
use Livewire\Component;

class Dashboard extends Component
{
    public $articleCount;
    public $babynameCount;
    public $subscribeCount;
    public $contacts;
    public $subscribers;
    public $namelistCount;

    public function mount() {
        $this->articleCount = Article::count();
        $this->babynameCount = Babyname::all()->count();
        $this->namelistCount = Namelist::all()->count();
        $this->subscribeCount = Newsletter::count();
        $this->contacts = Contact::select(['id', 'name', 'email', 'subject', 'message'])
        ->take(9)
        ->get();
        $this->subscribers = Newsletter::select(['id', 'email', 'created_at'])
        ->take(9)
        ->get();
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}