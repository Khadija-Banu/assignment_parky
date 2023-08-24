<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
  public function search(Request $request){
  
    $query=$request->input(key: 'query');
    
    $posts=Post::where('title','LIKE',"%$query%")->get();
    return view('backend.search_list',compact('posts','query'));
  }
}
