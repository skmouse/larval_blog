<?php
namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public function create($data)
    {
       $this->user->fill($data);

       $this->user->save();
    }

    public function updateById($id, $data)
    {
        $this->user = $this->getDataById($id);

        $this->user->fill($data);

        return $this->user->save();
    }

    public function getDataById($id)
    {
        return $this->user->find($id);
    }
}