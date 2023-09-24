@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Alumni Members</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header position-relative">
                    <div class="form-control-group pull-right">
                        <form action="{{ route('getMembers') }}" method="GET">
                            <input type="text" name="search" required />
                            <button type="submit" class="btn btn-success btn-sm">Search</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    @php
                    $sl=1;
                    @endphp

                    <table class="table table-hover">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Nick Name</th>
                            <th>Batch</th>
                            <th>Designation & Company</th>
                            <th>Blood Group</th>
                            <th>Member Profile</th>
                        </tr>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{$sl}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->profile->batch }}</td>
                            <td>{{ $user->profile->designation }}</td>
                            <td>{{ $user->profile->bloodGroup }}</td>

                            <td><a href="{{ route('profile.show', $user->id) }}" class="btn btn-danger btn-sm">View
                                    Profile</a></td>
                        </tr>
                        @php
                        $sl=$sl + 1;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>

                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection