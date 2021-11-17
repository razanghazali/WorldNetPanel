@extends('layouts.test')



@section('title')
   Users
@endsection

@section('content')
    <br>
    <br>

    @foreach($user as $users)
        <div class="container">
          <div class="col-6 col-md-4">
    <div class="card" style="width: 13rem;">
        <div class="card-body">
            <h5 class="card-title">{{$users->name}}</h5>
            <p class="card-text">{{$users->type}}</p>
            <a href="{{route('users.show',$users->id)}}" class="btn btn-sm btn-primary" style="color: #FFEA00">{{__('show')}}</a>
        </div>
    </div>
          </div>

    </div>
    @endforeach

@endsection
