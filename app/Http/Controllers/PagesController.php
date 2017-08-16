<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
      $posts=Post::orderBy('created_at', 'desc')->limit(4)->get();
    	return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
      	$first='lucy';
      	$last='gicici';

      $fullname= $first.' '.$last;
      $email='lucygicici@gmail.com';
      $data=[];
      $data['email']=$email;
      $data['fullname']=$fullname;

    	return view('pages.about')->withData( $data );
    }
	
	public function getContact(){
		return view('pages.contact');
    }
    public function getCarosel(){
    return view('pages.carosel');
    }
}
