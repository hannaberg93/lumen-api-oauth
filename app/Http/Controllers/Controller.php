<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function success($data, $responsecode){
        return response()->json(['data' => $data], $responsecode);
    }
    public function error($message, $responsecode){
        return response()->json(['message' => $message], $responsecode);
    }
}
