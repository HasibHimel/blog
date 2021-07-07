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
    <div class="card-body">
        <ul class="list-group">
                @foreach($users as $user)
                <li class="list-group-item">
                    <span class="badge">
                        <h4>
                            <strong>
                                <font size="+1" style="color: blue">{{$user->name}}</font>
                        </h4>
                        </strong>
                      
                </li>
                @endforeach
            </ul>

        </div>
    </div>
    @endsection