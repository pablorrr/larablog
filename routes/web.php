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
Auth::routes();
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

//Route::get('sending-queue-emails', [TestQueueEmails::class,'sendTestEmails']);

//breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');



//Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('check.admin.role'); - SPOSB PRZYPISANIA MIDDLEWARE DO TRASY
//Route::get('/dashboard', [HomeController::class, 'index'])->middleware();


//Route::get('/articles','App\Http\Controllers\ArticleController@index')->name('articles'); - to samodzialanie co wyzej


/**
 *  ADMIN ROUTE
 */
//uwaga CRUD NIE MOZE WYSTEPOWAC  DLA DWOCH MODELI NA TEJ SAMIEJ GRUPIE TRASYY!!! NALEZY TWORZY PODGRUPY TRAS DLA KAZDEGO MODELU OSOSBNO
Route::group([

    'middleware' => ['auth', 'check.admin.role'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {

        /**uwage nazwt tras musz byc rozne niz name do tych tras gdzie linki sa identyczne!! np admin/authors
        //inaczej sa bledy w wyysylanniu formularza
        //uwga wymagana zgodnosc ze specyfikacja  uzywanego fromyulrza- jest to adres pod ktorym bedzie obslugiwane zadanie
        //store jako metoda przetwazania danych
        //scilse powiazaanie w redirect  back*/

        //user CRUD
        //add



        Route::post('/users', [AdminUserController::class, 'storeUser'])->name('store');

        //update
        Route::get('/{user}/edit', [AdminUserController::class, 'editUser'])->name('edit');
        Route::put('/{user}', [AdminUserController::class, 'updateUser'])->name('update');

        //delete
        Route::get('/{user}/destroy', [AdminUserController::class, 'destroyUser'])->name('destroy');

        //show
        Route::get('/user/{user}', [AdminUserController::class, 'showUser'])->name('show');
    });


    Route::group([
        'prefix' => 'articles',
        'as' => 'articles.',
    ], function () {

        //articles
        Route::get('/', [AdminArticlesController::class, 'index'])->name('index');


        //article CRUD
        //add
        Route::get('/add-article', [AdminArticlesController::class, 'create'])->name('create');
        Route::post('/article', [AdminArticlesController::class, 'store'])->name('store');

        //update
        Route::get('/{article}/edit', [AdminArticlesController::class, 'edit'])->name('edit');
        Route::put('/{article}', [AdminArticlesController::class, 'update'])->name('update');

        //delete
        Route::get('/{article}/destroy', [AdminArticlesController::class, 'destroy'])->name('destroy');


    });


});

