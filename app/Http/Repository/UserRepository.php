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


}