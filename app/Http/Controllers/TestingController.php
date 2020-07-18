<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Post;

class TestingController extends Controller
{
    public function notif()
    {
        //Alert::success('Success Title', 'Success Message')->position('top-end');
        //alert()->success('Post Created', '<strong>Successfully</strong>')->toHtml();
        //alert('Title','Lorem Lorem Lorem', 'success')->position('top-end');
        toast('Warning Toast','warning');
        return back();
    }

    public function map()
    {
        $posts = Post::with('author')->get();
        $data = $posts->map(function ($post) {
            $post->nama = $post->author->name;
            return $post;
        });
        dd($data->take(10));
        return view('map');
    }
}
