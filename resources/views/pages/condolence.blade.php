@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Condolence Message</h2>
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
                    <a href="{{ route('article.show', $article) }}" class="btn btn-danger">Full Message</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> 
<!--
End: President Message -->
<!--Begining: Future Event-->
<!-- <div class="pt-2" >
    <div class="col-2">
      <h3 style="border-bottom: 7px solid #8e0016;">Upcoming Event</h3>
    </div>
</div>
<div class="row p-2">
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
  </div>
  <div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
  </div>
</div>  -->

<!--End: Future Event-->
<!--Begining: Past Event-->
<!-- <div class="pt-2" >
    <div class="col-2">
      <h3 style="border-bottom: 7px solid #8e0016;">Past Event</h3>
    </div>
</div>
<div class="row p-2">
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
  </div>
  <div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reunion 2023</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-danger">Complete Event</a>
    </div>
  </div>
  </div>
</div> -->

<!--End: Past Event-->
   
</div>
<style type="text/css">
 
</style>
@endsection
