<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function api($status=true, $message = '', $data = [], $token ='')
    {
        if ($token) {
            $data = ['status'=> $status, 'message'=>$message, 'data'=>$data, 'token'=>$token];
        } else {
            $data = ['status'=> $status, 'message'=>$message, 'data'=>$data];
        }

        return response()->json($data);
    }
}
