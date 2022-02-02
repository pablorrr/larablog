<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all()->toJson();
        return $articles;

    }

    public function show($article_id)
    {
        $article = Article::findOrFail($article_id)->toJson();
        return $article;
    }


    //API TEST TRZEBA DOPISAC API DO URL , odniesienie do web.api route

    public function deleteArticle ($id) {
        if(Article::where('id', $id)->exists()) {
            $book = Article::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

}
