<?php
namespace App\Http;

use Illuminate\Http\Request;

class BaseRequest extends Request
{
    /**
     * 统一请求为json响应
     */

    public function expectsJson()
    {
        return true;
    }

    public function wantsJson()
    {
        return true;
    }
}