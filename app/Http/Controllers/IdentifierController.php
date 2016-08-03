<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;

class IdentifierController extends Controller
{
    public function index(Request $request)
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            $user = null;
        }
        return response()->json(array(
            'token_status' => ($user !== null)? "valid": "invalid"
        ));
    }
}
