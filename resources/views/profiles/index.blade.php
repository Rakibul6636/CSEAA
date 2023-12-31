@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" / style="height:100px;width:100px" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                <h2>{{$user ->username}}</h2>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
             @can ('update',$user->profile)
             <a href="/p/create">Add New Post</a>
            @endcan
            </div>
            @can ('update',$user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
               <div class="pe-4"><strong>{{$user->posts->count()}}</strong> posts</div>
               <div class="pe-4"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
               <div class="pe-4"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-3 fw-bold"> {{$user->profile->title}} </div>
            <div> {{$user->profile->description}}</div>
            
            <div>
               <a href="#">{{$user->profile->url}}</a> 
            </div>   
        </div>
    </div>
    <div class="row ">
       
        @foreach($user->posts as $post)
        <div class="col-4 pt-4">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post->image}}" / class="w-100">
            </a>
        </div>
        @endforeach
       
    </div>
</div>
@endsection
