<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    //post list show
    public function index(){
         $posts = Post::paginate(5);
        return view('backend.index',compact('posts'));
    }

    //New post create page open
    public function create(){
        $users=User::all();
        return view('backend.create',compact('users'));
    }

    //New post store in database
    public function store(PostRequest $request){
       try{
        $request->validate([
            'title'=>'required',
        ]);

        $data=$request->all();
        if($request->image){
            $image=$this->UploadImage($request->title,$request->image);
        }
        $data['image']=$image;
      
        Post::create($data);
        return redirect()->route('post_index');
       }
       catch(Exception $e){
        return redirect()-route('post_create')->withMessage($e->getMessage());
       }
    }

    //Individual post edit
    public function edit($id){
        $post = Post::find($id);
        return view('backend.edit', compact('post'));
    }
    
    //Individual post update
    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');

            if($request->hasFile('image')){
                $post=Post::where('id',$id)->first();
                $this->unlink($post->image);
                $data['image']=$this->UploadImage($request->title,$request->image);
            }
            Post::where('id', $id)->update($data);
            return redirect()->route('post_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

    //Individual post delete
    public function delete($id){
        $data=Post::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    //Image upload function
    public function UploadImage($title,$image){
       $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
       $file_name=$timestamp . '-'.$title. '.' .$image->getClientOriginalExtension();
       $pathToUpload=storage_path().'/app/public/post/';

       if(!is_dir($pathToUpload)){
        mkdir($pathToUpload, 0755, true);

       }
       Image::make($image)->resize(634,792)->save($pathToUpload.$file_name);
       return $file_name;
    }

    //Image update then previous image delete in storage folder
    private function unlink($image){
        $pathToUpload=storage_path().'/app/public/post/';
        if($image != '' && file_exists($pathToUpload.$image)){
            @unlink($pathToUpload.$image);
        }
    }
}
