<?php

namespace App\Http\Repository;

use App\Http\BaseRepository;
use App\Content;

class ContentRepository extends BaseRepository
{
	public $model;

	public function __construct(Content $content)
	{
		$this->model = $content;
	}
}