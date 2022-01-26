<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
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

    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->getAll();
        return view('admin/users', compact('users'));

    }

    /**
     * @param UserRepository $userRepository
     * @param $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * edit
     */

    public function editUser(UserRepository $userRepository, $user_id)//DI
    {
        $user = $userRepository->edit($user_id);
        $usersRole = $userRepository->getUserRole();

        return view('admin/edit-user', compact('user', 'usersRole'));
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

        return redirect()->route('admin.articles')->with([
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    /**
     * begin add
     */
    public function createUser(UserRepository $userRepository)
    {
        $user = $userRepository->getAll();
        $userRole = $userRepository->getUserRole();

        return view('admin/add-user', compact('user', 'userRole'));
    }


    public function storeUser(AddUserRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');


        $user->save();

        return redirect()->route('admin.articles')->with([
            'status' => [
                'type' => 'success',
                'content' => 'User został dodany',
            ]
        ]);

    }

    /**
     * end add
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

        return view('admin/show-user', compact('user'));
    }


    public function destroyUser($user_id, UserRepository $userRepository)
    {

        $userRepository->delete($user_id);

        return redirect()->route('admin.articles')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Uzytkownik został usunięty',
            ]
        ]);


    }

}
