<?php

use App\Http\Controllers\admin\AdminArticlesController;
use App\Http\Controllers\admin\AdminUserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TestQueueEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/collection',[ArticleController::class,'collectionTest']);

Route::get('/collection/macro',[ArticleController::class,'collectionTestMacro']);
