<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function api($message = '', $code='', $data = [], $token ='')
    {
        if ($token) {
            $data = ['msg'=>$message, 'code'=>$code, 'data'=>$data, 'token'=>$token];
        } else {
            $data = ['msg'=>$message, 'code'=>$code, 'data'=>$data];
        }

        return response()->json($data);
    }
}
