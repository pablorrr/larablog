<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;

use Illuminate\Http\Request;

class AdminArticlesController extends Controller
{   //todo: napisac setter dla usera lub getter  i ustalic  wlascowsocklasy user

    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    private $user;

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function get_user()
    {
        $this->user = auth()->user();
        return $this->user;

    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));

    }

    /**
     * @param $article_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * czesc dot edycji
     */
    public function edit($article_id) {
        //pobranie z DB
        $article = Article::findOrFail($article_id);

        return view('admin.articles.edit-article', compact('article'));
    }

    public function update($article_id, UpdateArticleRequest $request) {

        $article = Article::findOrFail($article_id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        return redirect()->route('admin.articles.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zapisano zmiany',
            ]
        ]);
    }

    /**
     * koniec czewsci edycji
     */

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * czesc dotyczaca dodawania usera
     */
    public function create()
    {
        $user = $this->get_user();
        return view('admin.articles.add-article', compact('user'));
    }



    public function store(AddArticleRequest $request)
    {
        $article = new Article;

        $article->author_id = $this->get_user()->id;
        $article->title = $request->input('title');
        $article->content = $request->input('content');


        $article->save();

        return redirect()->route('admin.articles.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Artykuł został dodany',
            ]
        ]);

    }

    /**
     * koniec czesci dodoania
     */

    /**
     * @param $article_id
     * @return \Illuminate\Http\RedirectResponse
     */

      public function destroy($article_id) {

          $article = Article::all()->find($article_id);


          $article->delete();

          return redirect()->route('admin.articles.index')->with([
                  'status' => [
                      'type' => 'success',
                      'content' => 'Artykuł został usunięty',
                  ]
              ]);

      }
}
