<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\AbstractRouteCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});
//przed articles nalezy dopisac - api
//Route::get('articles/',[ArticleController::class,'index']);

//Route::get('articles/{id}',[ArticleController::class,'show']);

Route::delete('articles/{id}',[ArticleController::class,'deleteArticle']);


