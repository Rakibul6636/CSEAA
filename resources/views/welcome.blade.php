@extends('layouts.app')

@section('content')
<div class="container">
    <!-- begin:home-slider -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>


        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Birds Eye View</h5>
                    <p>Skey View of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Red Buses</h5>
                    <p>Red Buses of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Academic Building</h5>
                    <p>Academic Building of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>BRUR Banner</h5>
                    <p>Name Banner of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Academic Building</h5>
                    <p>Academic Building of BRUR.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end:home-slider -->
    <!-- Begining: President Message-->
    <div class="pt-5">
        <div class="col-3">
            <h3 style="border-bottom: 7px solid #8e0016;">Message From President</h3>
        </div>
        <div class="row p-2">
    @foreach($presidentMessage as $article)
        <div class="col-4 pt-2">
            <div class="card" style="width: 18rem;">
                <img src="/storage/{{$article->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <hr>
                    <h5 class="card-title fw-bold">{{$article->title}}</h5>
                    <p class="card-text text-truncate">{{$article->contentText}}.</p>
                    <a href="{{ route('article.show', $article) }}" class="btn btn-danger">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--End: President Message -->
    <!--Begining: Past Event-->
    <div class="pt-2">
        <div class="col-2">
            <h3 style="border-bottom: 7px solid #8e0016;">Upcoming Event</h3>
        </div>
    </div>
    <div class="row p-2">
    @foreach($articles as $article)
        <div class="col-4 pt-2">
            <div class="card" style="width: 18rem;">
                <img src="/storage/{{$article->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h7 class="">{{$article->created_at->diffForHumans()}}</h7>
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text text-truncate">{{$article->contentText}}.</p>
                    <a href="{{ route('article.show', $article) }}" class="btn btn-danger">Event Details </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pt-2">
        <div class="col-1">
            <h3 style="border-bottom: 7px solid #8e0016;">Notice</h3>
        </div>
    </div>
    <div class="row p-2">
    @foreach($notice as $article)
        <div class="col-4 pt-2">
            <div class="card" style="width: 18rem;">
                <img src="/storage/{{$article->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h7 class="">{{$article->created_at->diffForHumans()}}</h7>
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text text-truncate">{{$article->contentText}}.</p>
                    <a href="{{ route('article.show', $article) }}" class="btn btn-danger">Full Notice </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!--End: Past Event-->

</div>
<style type="text/css">
.president {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
@endsection