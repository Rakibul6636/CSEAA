@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Scholarship</h2>
</div>
<div class="container">

<!-- Begining: President Message-->

<div class="row p-2">
    @foreach($articles as $article)
        <div class="col-4 pt-2">
            <div class="card" style="width: 18rem;">
                <img src="/storage/{{$article->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <hr>
                <h7 class="">{{$article->created_at->diffForHumans()}}</h7>
                    <h5 class="card-title fw-bold">{{$article->title}}</h5>
                    <p class="card-text text-truncate">{{$article->contentText}}.</p>
                    <a href="{{ route('article.show', $article) }}" class="btn btn-danger"> Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

   
</div>
<style type="text/css">
 
</style>
@endsection
