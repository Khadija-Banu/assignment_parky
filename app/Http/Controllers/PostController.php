<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    //
    public function index(){
       $posts=Post::all();
        return view('backend.index',compact('posts'));
    }

    public function create(){
        return view('backend.create');
    }

    public function store(Request $request){
       try{
        $data=$request->all();
        if($request->image){
            $image=$this->UploadImage($request->title,$request->image);
        }
        $data['image']=$image;
       
        Post::create($data);
        return redirect()->route('post_index');
       }
       catch(Exception $e){
        dd($e->getMessage());
       }
    }

    public function edit($id){
   $post=Post::find($id);
        return view('backend.Edit',compact('post'));
    }
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
    public function delete($id){
        $data=Post::find($id);
        $data->delete();
        return redirect()->back();
        
    }


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

    private function unlink($image){
     
$pathToUpload=storage_path().'/app/public/post/';
if($image != '' && file_exists($pathToUpload.$image)){

    @unlink($pathToUpload.$image);
}
    }
}
