<?php

use App\Http\Controllers\admin\AdminArticlesController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ArticlesTable;
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

Route::get('/', function () {
    return view('welcome');
});

//breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
//Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('check.admin.role'); - SPOSB PRZYPISANIA MIDDLEWARE DO TRASY
//Route::get('/dashboard', [HomeController::class, 'index'])->middleware();
//uwaga jest to zaposa obowiazujacy w lar 8 we wczesniejszych ver jest inaczej
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
//Route::get('/articles','App\Http\Controllers\ArticleController@index')->name('articles'); - to samodzialanie co wyzej



/**
 *  ADMIN ROUTE
 */

Route::group([

    'middleware' => ['auth', 'check.admin.role'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {



    Route::get('/articles', [AdminArticlesController::class, 'index'])->name('articles');

    //autor CRUD

    //uwage nazwt tras musz byc rozne niz name do tych tras gdzie linki sa identyczne!! np admin/authors
    //inaczej sa bledy w wyysylanniu formularza
    //uwga wymagana zgodnosc ze specyfikacja  uzywanego fromyulrza- jest to adrespodktorym bedzie obslugiwane zadanie
    //store jakometoda przetwazania danych
    //scilsepowiazaanie w redirect  back


    //article CRUD
    //add
    Route::get('/add-article', [AdminArticlesController::class, 'create'])->name('articles.create');
    Route::post('/articles', [AdminArticlesController::class, 'store'])->name('articles.store');

    //update
    Route::get('/{article}/edit', [AdminArticlesController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [AdminArticlesController::class, 'update'])->name('articles.update');

    //delete
    Route::get('/{article}/destroy', [AdminArticlesController::class, 'destroy'])->name('articles.destroy');

    //show
     Route::get('/user/{user}', [AdminUserController::class,'showUser'])->name('user.show');

});

