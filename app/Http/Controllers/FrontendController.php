<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class FrontendController extends Controller
{
    public function home(){
        $users=User::all();
        $posts=Post::all();

        return view('backend.frontend_home',compact('users','posts'));
    }
}
