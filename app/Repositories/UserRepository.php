<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{

    public function __construct(User $model)//DI
    {
        $this->model = $model;
    }

    /**  public function getAllAdmins()
     * {
     * return $this->model->where('role', 'admin')->orederBy('name', 'asc')->get();
     * }
     *
     * public function getAllRedactors()
     * {
     * return $this->model->where('role', 'redactor')->orederBy('name', 'asc')->get();
     * }
     *
     *
     * public function getAllReaders()
     * {
     * return $this->model->where('role', 'reader')->orederBy('name', 'asc')->get();
     * }
     */

    public function edit($id)
    {
        return $this->model->findOrFail($id);
    }

//$users = User::select('name')->distinct()->get();
    public function getUserRole()
    {
        return  DB::table('users')->select('role')->distinct()->get()->all();
    }


}
