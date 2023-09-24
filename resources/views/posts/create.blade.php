@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-3">
                <div class="row">
                    <h1>Add New Post</h1>
                </div>
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>


                    <input id="caption" name="caption" type="text"
                        class="form-control @error('caption') is-invalid @enderror" caption="caption"
                        value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <strong>{{ $message }}</strong>

                    @enderror

                </div>
            </div>
        </div>
        <div class="row ">

            <label for="image" class="col-md-4 col-form-label">Post Image</label>

            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
            <strong>{{ $message }}</strong>
            @enderror

        </div>
        <div class="row pt-4">
            <button class="btn btn-primary">Add new Post</button>
        </div>

    </form>
</div>
@endsection