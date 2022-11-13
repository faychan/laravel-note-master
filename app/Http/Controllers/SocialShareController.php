<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Share;


class SocialShareController extends Controller
{
    public function index(){
        return \Share::page('https://www.google.com/', 'the notes')
        ->facebook()
        ->twitter()
        ->whatsapp();
        
        // $posts = Post::get();
        // return view('notes.index')->with('socialShare', $socialShare);
    }
}