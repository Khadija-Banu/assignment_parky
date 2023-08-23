@extends('backend.master')

@section('content')



  <div class="container m-5 p-5">

 
    <div class="card">
        <div class="card-header">User List  <a class="btn btn-sm btn-primary " style="margin-left: 30px" href="{{route('post_index')}}">Post list</a> 
          </div>
        <div class="card-body p-5">

            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Ser No</th>
                    <th scope="col">Name</th>
                    <th>Email</th>
                    <th>Blogs</th>
                 
                  </tr>
                </thead>
                <tbody>
                 @php
                   $i=1  
                 @endphp
                  @foreach ($users as $user)
           
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->posts as $post)
                        <li>{{$post->title}}</li>  
                        @endforeach
                    </td>
                   
                   
                   
                  </tr>
    
                  @endforeach
                    
                
             
                </tbody>
              </table>
        </div>

</div> </div>
@endsection