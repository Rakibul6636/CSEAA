@extends('layouts.app')

@section('content')
<div class="d-flex p-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100" style="font: weight 500px;;"><h2>Update Profile</h2>
</div>

<div class="container">
    <div class=" bg-light p-9">
        <form name="memberForm" method="post" action="/profile/{{$user->id}}" class="formClass"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <div class="row justify-content-center aria-describedby">
                    <div class="col-12 pt-5" >
                        <div class="card">

                            <div class="card-body">

                                <div class="row">
                                    <label for="name">* Name:
                                        <input type="text" value="{{ old('title') ?? $user->name }}" name="name">
                                    </label>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                            with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    </form>
</div>
</div>
@endsection