<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Requests\User\Create;
use App\Http\Requests\Login\Create as LoginCreate;
use App\Http\Repository\UserRepository;
use App\User;


class UsersController extends Controller
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

        $data = ['email' => $email, 'password' => $password];

        if ($this->UserRepository->getUserInfoByEmail($email)) {

            return $this->api('用户名已经存在', 400);
        }

        $id = $this->UserRepository->create($data);

        if (!$id) {
            return $this->api('注册失败', 200);
        }

        return $this->api('注册成功', 400);
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

    /**
     * 用户登陆
     */
    public function login(LoginCreate $request)
    {
        $email = $request->input(['email']);

        $password = $request->input(['password']);

        $userEmail = $this->UserRepository->getUserInfoByEmail($email);
        if (!$userEmail) {
            return $this->api('账号不存在');
        }

        $userPassword = $this->UserRepository->checkPassword($email, $password);
        if (!$userPassword) {
            return $this->api('密码错误');
        }

        $token = $this->UserRepository->createToken($email, $password);

        return $this->api('登陆成功', 20000, [$userEmail], $token);
    }

    /**
     * 删除用户
     */
    public function delete($id)
    {
        $this->UserRepository->delete($id);

        return $this->api('删除成功');
    }

    public function getInfo(Request $request)
    {
        $token = $request->headers->get('token');

        if (!$token) {
            return $this->api('token不存在或者过期',400);
        }

        $userInfo = $this->UserRepository->getUserInfoByToken($token);


        return $this->api('登陆成功', 20000, $userInfo, $token);
    }


    /**
     * test
     */
    public function getAllContent()
    {
        // 获取用户关联的文章
        //$user_contents = User::find(20)->contents()->where('title', 'test title')->get();
        // 获取文章关联的用户
        //$data = Content::find(1)->users->toArray();
//        $user_contents = User::find(20)->contents();
//        $user_contents = User::has('contents')->get()->toArray();
//        $user_contents = User::whereHas('contents', function ($query) {
//            $query->where('title', '=', 'test title');
//        })->get()->toArray();

        $user_contents = Content::with('users')->get()->toArray();
        print_r($user_contents);
        exit;
    }
}
