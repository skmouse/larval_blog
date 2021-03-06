<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	/**
	 * 内容表
	 */
	protected $table = 'content';

	protected $fillable = [
		'title', 'content', 'user_id',
	];

	public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
