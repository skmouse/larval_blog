<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\Create;
//use App\Http\Requests\User\Update;
use App\Http\Repository\UserRepository;

class UserController extends Controller
{
    /**
     * 用户数据操作
     */
    public $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * 用户注册
     */
    public function register(Create $request)
    {
        $email = $request->input('email');

        $password = md5($request->input('password'));

        $data = ['email'=>$email, 'password'=> $password];

        $this->UserRepository->create($data);

        return $this->api();
    }

    /**
     * 用户数据更新
     */
    public function update($id, Request $request)
    {
       if ($this->UserRepository->getDataById($id)) {

           $data = $request->only('username', 'age');
           $this->UserRepository->updateById($id, $data);

           return $this->api();
       }


    }
}