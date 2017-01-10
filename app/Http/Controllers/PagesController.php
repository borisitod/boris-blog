<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;
use GuzzleHttp\Client;

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

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function ($message) use ($data) {
                    $message->from($data['email']);
                    $message->to('admin@iar.life');
                    $message->subject($data['subject']);
                });
        Session::flash('success', 'Your Email was Sent!');
        return redirect('/');

//        $token = $request->input('g-recaptcha-response');
//
//        if($token){
//            $client = new Client();
//            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
//                'form_params'=>[
//                    'secret'=>'6LcSRREUAAAAANYQCN6-GnCJf6oz534ODinYsYfT',
//                    'response'=>$token
//                ]
//            ]);
//
//            $result = json_decode($response->getBody()->getContents());
//            if($result->success) {
//                Mail::send('emails.contact', $data, function ($message) use ($data) {
//                    $message->from($data['email']);
//                    $message->to('admin@iar.life');
//                    $message->subject($data['subject']);
//                });
//                Session::flash('success', 'Your Email was Sent!');
//                return redirect('/');
//            }else{
//                //$result->error_code;
//                Session::flash('error', 'You are probably a robot');
//                return redirect()->back();
//            }
//        }
    }
}
