<?php

use App\Http\Controllers\admin\AdminArticlesController;
use App\Http\Controllers\admin\AdminUserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TestQueueEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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

//Route::get('user/session',[AdminUserController::class,'showUserWithSession']);
Route::post('user', [UserAuthController::class, 'userLogin']);
Route::view("login", 'login');
Route::view("profile", 'profile');



Route::get('login', function () {
    if (session()->has('user')) {
        session()->pull('user');
    }
    return redirect('profile');
});

Route::get('logout', function () {
    if (session()->has('user')) {
        session()->pull('user');
    }
   return redirect('login');
});
