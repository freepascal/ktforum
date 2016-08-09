<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use JWTAuth;
use App\Topic;
use App\Category;

class TopicController extends Controller
{
    public function index()
    {
        return response()->json(['topics' => Topic::orderBy('id', 'desc')->get()]);
    }

    public function paginate($category_id, $page_current, $page_capacity)
    {
        // if $category is slug
        $category = Category::where('slug', '=', $category_id)->first();
        if ($category) {
            $category_id = $category->id;
        }

        $topics = Topic::with('category')->with('user')->where('category_id', '=', $category_id)->orderBy('id', 'desc');
        $total_topics = $topics->count();
        $page_topics = $topics
                        ->skip($page_capacity*($page_current-1))
                        ->take($page_capacity)
                        ->get();

        return response()->json(array(
            'page_topics' => $page_topics,
            'total_topics' => $total_topics
        ));
    }

    public function show($slug)
    {
        $topic = Topic::with('replies')->where('slug', '=', $slug)->first();
        if (!$topic) {
            $topic = Topic::with('replies')->where('id', '=', $slug)->first();
        }
        return response()->json(['topic' => $topic]);
    }

    public function store(Request $request)
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch(Exception $e) {

        }
        if ($user == null) {
            Log::info('store() -> lack_of_permission');
            return response()->json(['msg' => 'You do not have permission to do this task']);
        }
        // debug
        Log::info('============= START DEBUGGING =============');
        Log::info('title = '. $request->input('title'));
        Log::info('category_id = '. $request->input('category_id'));
        Log::info('user_id = '. $request->input('user_id'));
        Log::info('body = '. $request->input('body'));
        Log::info('============= END DEBUGGING ===============');
        $new_topic = new Topic;
        $new_topic->title = $request->input('title');
        $new_topic->category_id = $request->input('category_id');
        /*
        $slugify = new Slugify(array(
            'rulesets' => array(
                'default',
                'vietnamese'
            )
        ));
        $new_topic->slug = $slugify->slugify($new_topic->title);
        */
        $new_topic->body = $request->input('body');
        $new_topic->user_id = $user->id;
        if ($new_topic->save()) {
            Log::info('store() -> save successfully');
            return response()->json(['msg' => 'Save your topic successfully']);
        }
        Log::info('store() -> failure');
        return response()->json(['msg' => 'An error occurs while saving your topic']);
    }
}
