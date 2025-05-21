<?php

namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\CategoryArticle;
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
        Article::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Article deleted successfully!',
        );
    }

    public function deleteArticle($articleId)
    {
        $article = Article::findOrFail($articleId);
        $article->delete();
        $this->reset();
        $this->dispatch(
            'banner-message', 
            style: 'danger',
            message: 'Article deleted successfully!',
        );
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        if (!$this->search) {
            $articles = Article::orderBy('id', $this->sort)->paginate($this->perPage);
        } elseif($this->search > 3) {
            $articles = Article::where('title', 'like', '%'.$this->search.'%')->orderBy('id', $this->sort)->paginate($this->perPage);
        }

        return view('livewire.admin.article.index')->with([
            'articles' => $articles,
            'categories' => CategoryArticle::liveSearch('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage),
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function gotoEdit($articleId)
    {
        return redirect('/admin/article/'.$articleId.'/update');
    }
}