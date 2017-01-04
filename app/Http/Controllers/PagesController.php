<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PagesController extends Controller
{
    //

    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome', compact('posts'));
    }

    public function getAbout(){
        $first = 'Junchi';
        $last = 'Chen';
        $full = $first . " " . $last;


        return view('pages.about', compact('full'));
    }

    public function getContact(){
        $email = 'chenjunchi41$@gmail.com';
        return view('pages.contact', compact('email'));
    }
}
