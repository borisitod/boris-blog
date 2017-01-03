<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

    public function getIndex(){
        return view('welcome');
    }

    public function getAbout(){
        return view('about');
    }

    public function getContact(){
        return view('contact');
    }
}
