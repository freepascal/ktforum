<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Log;

class UserController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $user = $this->authenticate();

        if ($request->file()) {
            Log::info('Form co file nhe!');
        } else {
            Log::info('k0 tim thay file');
        }

        Log::info('request->avatar->realpath = '. $request->file('avatar')->getRealPath());

        Storage::disk('avatar')->put(
            $user->id,
            file_get_contents($request->file('avatar')->getRealPath())
        );

        return response()->json(['success' => 'Update your avatar successfully']);
    }
}
