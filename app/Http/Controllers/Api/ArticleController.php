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

    public function delete($article_id)
    {


        if (Article::where('id', $article_id)->exists()) {

            $article = Article::all()->find($article_id);
            $article->delete();
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
