<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

    public function getIndex(){
        return view('pages.welcome');
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
