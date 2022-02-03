<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param UserRepository $userRepository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    /**
     * @param UserRepository $userRepository
     * @param $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * edit
     */

    public function showUserWithSession(Request $request, $id)
    {
        return $request->session()->all();
    }


    public function editUser(UserRepository $userRepository, $user_id)//DI
    {
        $user = $userRepository->edit($user_id);
        $usersRole = $userRepository->getUserRole();

        return view('admin.users.edit-user', compact('user', 'usersRole'));
    }

    /**
     * @param $id
     * @param UpdateUserRequest $request
     * @param UserRepository $userRepository
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateUser($id, UpdateUserRequest $request, UserRepository $userRepository)
    {

        $User = $userRepository->find($id);
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->role = $request->input('role');
        $User->save();

        return redirect()->route('admin.articles.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zapisano zmiany',
            ]
        ]);
    }

    /**
     * end edit
     */


    /**
     * @param UserRepository $userRepository
     * @param $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function showUser(UserRepository $userRepository, $user_id)//DI
    {
        //  $user = User::findOrFail($user_id);- stary sposob bez  repozytorium
        $user = $userRepository->find($user_id);

        return view('admin.users.show-user', compact('user'));
    }


    public function destroyUser($user_id, UserRepository $userRepository)
    {

        $userRepository->delete($user_id);

        return redirect()->route('admin.articles.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Uzytkownik został usunięty',
            ]
        ]);


    }

}
