<?php

use App\Http\Controllers\admin\AdminArticlesController;
use App\Http\Controllers\admin\AdminUserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\SessionController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




/**
 * https://www.youtube.com/watch?v=2XUOWzoLcXM
 */

Route::get('/session/get', [SessionController::class, 'getSessionData'])->name('session.get');

Route::get('/session/set', [SessionController::class, 'storeSessionData'])->name('session.set');

Route::get('/session/remove', [SessionController::class, 'deleteSessionData'])->name('session.remove');

