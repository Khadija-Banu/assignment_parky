@extends('backend.master')
@section('content')

<div class="container m-5 p-5">
    <div class="m-5">
        <div> <a class="btn btn-lg btn-secondary " href="{{route('post_index')}}">Post List</a>
            <a class="btn btn-lg btn-primary " href="{{route('user_list')}}">User List</a>
            <a href="{{route('f_home')}}" class="btn btn-lg btn-success">Home Page</a>
        </div>

        <x-app-layout>
            
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        
           
        </x-app-layout>
    </div>
    
</div>

@endsection


