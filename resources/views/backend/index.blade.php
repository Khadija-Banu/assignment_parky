@extends('backend.master')

@section('content')


  <div class="container m-5 p-5">
    <div class="card">
        <div class="card-header">Post List  <a class="btn btn-sm btn-primary " style="margin-left: 30px" href="{{route('post_create')}}">Add new Posts</a> 
          <a class="btn btn-sm btn-primary " style="margin-left: 30px" href="{{route('user_list')}}">User List</a></div>
        <div class="card-body p-5">

            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Ser No</th>
                    <th scope="col">Title</th>
                    <th>Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 @php
                   $i=1  
                 @endphp
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$post->title}}</td>
                    
                    <td>
                      @if(file_exists(storage_path().'/app/public/post/'.$post->image) &&(!is_null($post->image)))
                      <img src="{{asset('storage/post/'. $post->image)}}"height="100px"width="150px">
                      @else
                      <img src="{{asset('default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->date}}</td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('post_edit',$post->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('post_delete',$post->id)}}">Delete</a>
                    </td>
                  </tr>
                  
                  @endforeach    
                </tbody>
              </table>
              {{ $posts->links() }} 
        </div>

</div> </div>
@endsection