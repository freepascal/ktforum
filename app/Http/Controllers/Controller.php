<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getOr404($result)
    {
        if ($result == null) {
            return response()->json(['error' => 'page_not_found']);
        }
        return $result;
    }

    /**
    * return user if he logged on
    * else throws JWTException
    **/
    public function authenticate($error = '')
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch(JWTException $e) {
            return response()->json(array(
                'error' => $error? $error: 'JWTException'
            ));
        }
        return $user;
    }
}
