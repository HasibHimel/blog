@extends('layouts.admin')

@section('adminContent')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div>

  </div>
  <div class="row">
  <div class="column" style="float: left; width: 50%; padding: 10px;">
  <div class="card-body">
    <ul class="list-group">
      @foreach($users as $user)
      <li class="list-group-item">
        <span class="badge">
          <h3>
            <strong>
              <font size="+1" style="color: blue">{{$user->name}}</font>

            </strong>
          </h3>
        </span>
        <h5><strong>Email:</strong> {{$user->email}}</h5>
        <h5><strong>Stutus:</strong>
          @if($user->isAdmin)
          {{'Admin'}}
          @else
          {{'General User'}}
          @endif
        </h5>
        <a href="{{route('admin.control.change', ['user_id'=>$user->id])}}" onclick="return confirm('Are you sure?')">
          <font size="-1" style="color: red">Change Status</font>
        </a>

      </li>
      @endforeach
    </ul>


  </div>
  </div>
  
  
</div>
@endsection