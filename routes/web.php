<?php
use Illuminate\Support\Facades\Route;

use App\Http\Resources\UserCollection;
use App\Models\User;

Route::get('/users', function () {
    return UserCollection::collection(User::all());
});
