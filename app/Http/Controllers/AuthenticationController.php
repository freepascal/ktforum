<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'Could not create token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|min:8',
        ));
        if ($validator->fails()) {
            return response()->json(array('message' => $validator->messages()), 400);
        }
        $user = new User;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return response()->json(array(
            'token' => $this->jwtauth->setRequest($request)->fromUser($user)
        ));
    }

    /**
    ** Get authenticated user
    **/
    public function me(Request $request)
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function validateToken(Request $request)
    {
        $user = null;
        try {
            //$user = JWTAuth::setRequest($request)->parseToken()->authenticate();
            $user = JWTAuth::parseToken()->authenticate();
        } catch(JWTException $e) {
            return response()->json(['token_status' => "jwtexception"]);
        }
        if ($user != null) {
            return response()->json(['token_status' => "valid"]);
        }
        return response()->json(['token_status' => "invalid"]);
    }

    public function header(Request $request)
    {
        $header = $request->header();
        return response()->json(array(
            'header' => $header,
            'authorization' => isset($header['authorization'])? $header['authorization']: 'none'
        ));
    }
}
