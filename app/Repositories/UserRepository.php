<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{

    public function __construct(User $model)//DI
    {
        $this->model = $model;
    }

    public function getAllAdmins()
    {
        return $this->model->where('role', 'admin')->orederBy('name', 'asc')->get();
    }

    public function getAllRedactors()
    {
        return $this->model->where('role', 'redactor')->orederBy('name', 'asc')->get();
    }


    public function getAllReaders()
    {
        return $this->model->where('role', 'reader')->orederBy('name', 'asc')->get();
    }


}
