<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //
    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    public function getSingle($slug){
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        return view('blog.single')->withPost($post);

    }
}
