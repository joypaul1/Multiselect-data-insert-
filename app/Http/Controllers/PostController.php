<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function postCreate()
    {
        return view('welcome');
    }

    public function postData(Request $request)
    {

            // Submitted Posts
            $cats = $request->cat;

            // Post records to be saved
            $Post_records = [];

            // Add needed information to Post records
            foreach($cats as $cat)
            {
                //dd($cat);
                if(! empty($cat))
                {
                    // Get the current time
                    $now = Carbon::now();

                    // Formulate record that will be saved
                    $Post_records[] = [
                        'cat' => $cat,
                        'name' =>$request->name,
                        'description' =>$request->description,
                        'updated_at' => $now,  // remove if not using timestamps
                        'created_at' => $now   // remove if not using timestamps
                    ];
                }
            }

            // Insert Post records
            Post::insert($Post_records);
            dd('success');

    }

    public function showData()
    {

        $post = Post::first();
        //return json_encode ($post->cat);
        return view('showdata',compact('post'));
    }
}
