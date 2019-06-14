<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Content;

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

    /**
     * 获取与用户关联的文章记录
     */
    public function contents()
    {
        return $this->hasMany(Content::class, 'user_id','id');
    }
}
