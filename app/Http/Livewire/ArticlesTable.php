<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesTable extends Component
{

    use WithPagination;


    public $title, $content, $article_id;
    public $search = '';
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];
    public $updateArticle = false;

    // Validation Rules
    /* protected $rules = [
         'name'=>'required',
         'description'=>'required'
     ];*/


    public function render()
    {
        return view('livewire.articles-table', [
            'articles' => Article::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

    /**
     * @param $id
     * @return void
     *
     * Edit - edit and update methods
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $this->title = $article->title;
        $this->content = $article->content;
        $this->article_id = $article->id;
        $this->updateArticle = true;
    }

    public function update()
    {

        // Validate request
        //    $this->validate();

        try {

            // Update category
            Article::find($this->article_id)->fill([
                'title' => $this->title,
                'content' => $this->content
            ])->save();


            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Article Updated Successfully!!"
            ]);

            // $this->cancel();
        } catch (\Exception $e) {


            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while updating category!!"
            ]);
            //  $this->cancel();
        }
    }


    public function deleteArticles()
    {
        Article::destroy($this->selected);
    }

    /**
     * store methods when article is added
     */


}
