<?php

namespace App\Http\Repository;

use App\Http\BaseRepository;
use App\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * 生成token
     */
    public function createToken($email, $password)
    {
        //token生成方式随便写的
        $code = $email . ':' . $password;

        return $token = base64_encode($code);
    }

    public function getUserInfoByEmail($email)
    {
        $data = $this->model->where('email', $email)->first();
        if (!$data) {
            return false;
        }

        return $data;
    }

    public function checkPassword($email, $password)
    {
        $data = $this->model->where(['email' => $email, 'password' => md5($password)])->first();
        if (!$data) {
            return false;
        }

        return $data;
    }

    public function getUserInfoByToken($token)
    {
        $token = base64_decode($token);

        $email = explode(':', $token)[0];

        return $this->getUserInfoByEmail($email);
    }
}