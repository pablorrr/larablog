<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class AdminUserController extends Controller
{

    public function showUser(UserRepository $userRepository, $user_id)//DI
    {
        //  $user = User::findOrFail($user_id);- stary sposob bez  repozytorium
        $user = $userRepository->find($user_id);

        return view('admin/show-user', compact('user'));
    }

}
