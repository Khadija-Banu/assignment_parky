@extends('backend.master')

@section('content')
<div style="margin-left: 100px">
    <div class="container m-5 p-5 " >
        <div class="card ms-5 ">
            <div class="card-header ">Post create
                <a class="btn btn-sm btn-primary " style="margin-left: 310px" href="{{route('post_index')}}">List category</a>
            </div>
            <div class="card-body">

<form action="{{route('post_store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group mt-2">
    <select class="form-select" name="user_id" >
      <option value="">Select author name</option>
      @foreach ($users as $user)
      <option value="{{$user->id}}" >{{$user->name}}</option>
      @endforeach
  
    </select>
  </div>
    <div class="form-group mt-2">
      <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>

    <div class="form-group mt-2">
      <input type="file" name="image" class="form-control" placeholder="Enter image">
    </div>
    <div class="form-group mt-2">
   <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
    </div>
    <div class="form-group mt-2">
 <input type="date"  class="form-control" name="date" placeholder="Enter date">
         </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>
</div>
@endsection