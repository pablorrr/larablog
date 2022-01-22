<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface MainMethods
{

    public function getAll($columns = array('*'));

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function find($id);
}

abstract class BaseRepository implements MainMethods
{
    protected $model;

    public function getAll($columns = array('*')) //zpais oznacza domyslenie wszytskei kolumny
    {
        return $this->model->get($columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->where("id", '=', $id)->update($data);
    }


    public function delete($id)
    {
        return $this->model->destroy($id);
    }


    public function find($id)
    {
        return $this->model->find($id);
    }

}
