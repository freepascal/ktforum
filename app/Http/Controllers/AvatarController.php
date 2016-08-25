<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use Storage;

class AvatarController extends Controller
{
    public function show($slug)
    {
        $avatar = $this->getOr404(Avatar::where('slug', '=', $slug)->first());
        return response()->json(['avatar' => $avatar]);
    }

    public function image($id)
    {
        $avatar = $this->getOr404(Avatar::where('id', '=', $id)->first());

        /*
        $path = storage_path('app/avatars/'. $avatar->path);
        $handler = new \Symfony\Component\HttpFoundation\File\File($path);

        $header_content_type = $handler->getMimeType();
        $header_content_length = $handler->getSize();
        $header = array(
            'Content-Type' => $header_content_type,
            'Content-Length'=> $header_content_length
        );
        */

        $file = Storage::disk('avatar')->get($avatar->path);
        
        $handler = new \Symfony\Component\HttpFoundation\File\File($file);

        return response()->make(file_get_contents($path), 200, $header);
    }

    public function store(Request $request)
    {
        $user = $this->authenticate();
        $avatar = new Avatar;
        if ($request->file()) {
            $avatar_image = $request->file('avatar');

            $avatar_path = $avatar_image->getClientOriginalName();

            $avatar->path = $avatar_path;
            $avatar->slug = $avatar_path;
            $avatar->user_id = $user->id;

            Storage::disk('avatar')->put($avatar->path, $avatar_image);
            $avatar->save();
            return response()->json(['success' => 'Save your avatar successful']);
        }
        return response()->json(['error' => 'No image']);
    }
}
