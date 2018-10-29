<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 用戶表
     */
    protected $table = 'user';

    protected $fillable = [
        'email', 'username', 'password', 'age',
    ];

    protected $hidden = [
        'password'
    ];
}
