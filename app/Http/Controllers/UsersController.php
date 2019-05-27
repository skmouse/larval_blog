<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\Create;
use App\Http\Requests\Login\Create as LoginCreate;
use App\Http\Repository\UserRepository;

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

		$id = $this->UserRepository->create($data);

		if ($id) {
            return $this->api('注册成功',200);
        }

		return $this->api('注册失败',400);
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

		return $this->api('登陆成功', 20000, [], $token);
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

		$userInfo = $this->UserRepository->getUserInfo($token);

		return $this->api('登陆成功', 20000, $userInfo, $token);
	}
}
