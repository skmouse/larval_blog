<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ContentRepository;

class ContentController extends Controller
{
	public $ContentRepository;

	public function __construct(ContentRepository $contentRepository)
	{
		$this->ContentRepository = $contentRepository;
	}

	public function create(Request $request)
	{
		$title = $request->input('title');
		$content = $request->input('content');
		$author = $request->input('author');
		$data = [
			'title' => $title,
			'content' => $content,
			'author' => $author,
		];

		$this->ContentRepository->create($data);

		return $this->api('创建成功', 200);
	}

	/**
	 * @param $id
	 * 删除内容
	 */
	public function delete($id)
	{
		$this->ContentRepository->delete($id);

		return $this->api('删除成功', 200);
	}

	public function update($id, Request $request)
	{
		if ($this->ContentRepository->getDataById($id)) {

			$data = $request->only('title', 'content');

			$this->ContentRepository->updateById($id, $data);

			return $this->api('更新成功', 200);
		}

		return $this->api('此内容不存在', 200);
	}

}
