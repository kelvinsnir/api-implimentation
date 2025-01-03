<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Requests\ApiLoginRequest;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(ApiLoginRequest $request){
     
        return $this->ok($request->get('email'));

        // return $this->success($message, 200);php

    }
}
