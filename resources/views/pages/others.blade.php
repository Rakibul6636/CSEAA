@extends('layouts.app')

@section('content')
<div class="container">
     <!-- begin:home-slider -->
     <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>


  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/image/slide1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/image/slide2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/image/slide3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/image/slide4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/image/slide5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- end:home-slider -->
<!-- Begining: President Message-->
<div class="pt-5" >
    <div class="col-5">
      <h3 style="border-bottom: 7px solid #8e0016;">History of CSE BRUR Achievement</h3>
    </div>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar, non malesuada quam auctor. Fusce in laoreet metus. Mauris eget lectus nec tellus laoreet gravida. Cras imperdiet blandit justo, eu tincidunt lorem porta et. Quisque id libero lobortis, consectetur ex at, efficitur justo. Suspendisse iaculis mi vitae sem bibendum rhoncus. Suspendisse mollis, purus sed viverra mollis, neque orci condimentum libero, vitae consectetur tortor orci nec sem. Vestibulum eleifend mattis dui eget rhoncus. Etiam euismod malesuada turpis, ut sagittis tortor fermentum tempor. Aenean id finibus leo. Ut dapibus eget sapien vel finibus. Nulla ut nunc nisi. Pellentesque aliquam congue imperdiet. Integer blandit neque vel ligula tempus, nec ullamcorper sapien tincidunt. Mauris non mi purus. In at dui gravida, bibendum lorem nec, scelerisque dolor.
    <br>
    Aenean tempus egestas nunc at ultrices. Vivamus porttitor ultricies ipsum, ut gravida massa. Etiam ac magna nunc. Quisque nec scelerisque erat. Vestibulum blandit diam eget felis condimentum tincidunt. Vivamus tincidunt, quam at dapibus luctus, diam nisl maximus odio, quis molestie magna mi vitae metus. Etiam non pretium massa. Quisque ut lectus libero. Sed malesuada justo id libero tristique, sit amet varius mauris posuere. Praesent ullamcorper pellentesque tempus. Duis eget est dictum, sollicitudin tellus quis, lobortis ipsum. Nulla in erat laoreet, malesuada tortor at, consequat augue. Donec dapibus viverra ex in pellentesque. Mauris quis nulla odio. Integer varius ligula sit amet erat varius consequat.
    </p>
</div>
<!--End: President Message -->
<!--Begining: Future Event-->
<div class="pt-2" >
    <div class="col-3">
      <h3 style="border-bottom: 7px solid #8e0016;">List of Achievments</h3>
    </div>
</div>
<div class="row p-2">
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
</div>
<!--End: Future Event-->
<!--Begining: Past Event-->

<div class="row p-2">
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
<div class="col-4 pt-2">
  <div class="card" style="width: 18rem;">
    <img src="/image/slideImage1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Achievement Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus nisl non ligula pulvinar.</p>
      <a href="#" class="btn btn-danger">Details of Achievement</a>
    </div>
  </div>
</div>
</div>

<!--End: Past Event-->
   
</div>
<style type="text/css">
 
</style>
@endsection
