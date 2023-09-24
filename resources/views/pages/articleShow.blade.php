@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header h3"> <img src="/storage/{{$articleshow->image}}"
                    class="m-2" style="height: 600px;width: 1000px;">
            </div>

            <div class="card-body">
            <h3 style="border-bottom: 7px solid #8e0016;">{{$articleshow->title}}</h3>
                <p>
                    {{$articleshow->contentText}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection