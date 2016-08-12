<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->file()) {
            $avatar = $request->file('avatar');
            $result = $avatar->save(storage_path($avatar->getClientOriginalName()));
            if ($result) {
                return response()->json(array('ok' => 'ok'))
            }
            return response()->json(['ok' => 'error']);
        }
        return response()->json(['ok' => 'error']);
    }
}
