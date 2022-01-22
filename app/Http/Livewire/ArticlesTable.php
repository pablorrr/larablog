<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesTable extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];

    public function deleteArticles()
    {
        Article::destroy($this->selected);
    }

    public function render()
    {
        return view('livewire.articles-table', [
            'articles' => Article::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }
}
