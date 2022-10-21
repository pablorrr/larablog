<?php

use App\Http\Controllers\admin\AdminArticlesController;



use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;


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
Auth::routes();
//require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




/**
 * CRUD RESOURCE TEST EXAMPLE
 */

Route::resource('blogs', BlogController::class);
// example -  php artisan make:controller PhotoController --resource --model=Photo -m
//delete- problem z p[roprawnym dzilaniem poprzez resource - koniecznosc zastosowania ososbnej customowej trasy
Route::get('/{blog}/destroy', [BlogController::class, 'destroy'])->name('blogs.delete.destroy');

/**
 *
 *  Domain | Method    | URI               | Name          | Action                                      | Middleware   |
+--------+-----------+-------------------+---------------+---------------------------------------------+--------------+
|        | GET|HEAD  | api/user          |               | Closure                                     | api,auth:api |
|        | GET|HEAD  | blogs             | blogs.index   | App\Http\Controllers\BlogController@index   | web          |
|        | POST      | blogs             | blogs.store   | App\Http\Controllers\BlogController@store   | web          |
|        | GET|HEAD  | blogs/create      | blogs.create  | App\Http\Controllers\BlogController@create  | web          |
|        | GET|HEAD  | blogs/{blog}      | blogs.show    | App\Http\Controllers\BlogController@show    | web          |
|        | PUT|PATCH | blogs/{blog}      | blogs.update  | App\Http\Controllers\BlogController@update  | web          |
|        | DELETE    | blogs/{blog}      | blogs.destroy | App\Http\Controllers\BlogController@destroy | web          |
|        | GET|HEAD  | blogs/{blog}/edit | blogs.edit    | App\Http\Controllers\BlogController@edit    | web          |
+--------+-----------+-------------------+---------------+---------------------------------------------+--------------
 *
 */
