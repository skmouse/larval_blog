<?php
namespace  App\Http\Repository;

use App\Http\BaseRepository;
use App\User;

class UserRepository extends BaseRepository
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 生成token
     */
    public function createToken($email, $password)
    {
        //token生成方式随便写的
        $code = $email.':'. $password.'linux';

        return $token = base64_encode($code);
    }

    public function getUserInfoByEmail($email)
    {
        $data =  $this->user->where('email',$email)->first();
        if (!empty($data)) {
            return $data;
        }

        return false;
    }

    public function checkPassword($email, $password)
    {
        $data =$this->user->where(['email'=>$email, 'password'=>$password])->first();
        if (!empty($data)) {
            return $data;
        }

        return false;
    }
}