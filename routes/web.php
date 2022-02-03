<?php
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//usage /user/id jak nie niedizla  artisan optimize

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});
