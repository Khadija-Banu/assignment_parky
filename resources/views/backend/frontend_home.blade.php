@extends('backend.master')

@section('content')
    
<div class="container m-5 p-5">

    <div class="row ">
        @foreach ($posts as $post)
            
   
        <div class=" col-md-6 col-lg-4 mb-3 mb-sm-0">
          <div class="card">
            <img src="{{asset('storage/post/'.$post->image)}}" height="200px"width="150px" class="card-img-top p-4" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->description}}</p>
              <p class="card-text">Created date : {{$post->date}}</p>
              <p class="card-text">Created by : {{$post->user->name?? ''}}</p>
            </div>

          </div>
        </div>
      
        @endforeach
      
       


@endsection