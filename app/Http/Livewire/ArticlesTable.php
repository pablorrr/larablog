<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesTable extends Component
{

    use WithPagination;


    public $title, $content, $article_id;
    public $author_id;
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

    public function getAuthorId()
    {
        $this->author_id = auth()->user()->id;
        return $this->author_id;

    }

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

    public function store()
    {
        // Validate Form Request
        //  $this->validate();

        try {
            // Create Category
            Article::create([
                'author_id' => $this->getAuthorId(),
                'title' => $this->title,
                'content' => $this->content
            ]);

            // Set Flash Message

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Category Created Successfully!!"
            ]);

            // Reset Form Fields After Creating Category
            //  $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message

            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while creating category!!"
            ]);

            // Reset Form Fields After Creating Category
            // $this->resetFields();
        }
    }
}
