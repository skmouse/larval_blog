<?php

namespace App\Http;

class BaseRepository
{
    public $model;

    public function create($data)
    {
        $this->model->fill($data);

        return $this->model->save();
    }

    public function updateById($id, $data)
    {
        $model = $this->getDataById($id);

        $model->fill($data);

        return $model->save();
    }

    public function getDataById($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function paginate($pagesize = 15)
    {

    }

    public function all()
    {
        return $this->model->all();
    }
}