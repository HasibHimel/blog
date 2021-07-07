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
                <div class="form-group">
                    <h4>Admins</h4>
                </div>
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
        <div class="column" style="float: left; width: 50%; padding: 10px;">
            <div class="card-body">
                <div class="form-group">
                    <h4>Unapproved Posts</h4>
                </div>
                <ul class="list-group">
                    @foreach($unApprovedPosts as $unApprovedPost)
                    <li class="list-group-item">
                        <span class="badge">
                            <h4>
                                <strong>
                                    <font size="+1" style="color: blue">{{$unApprovedPost->user->name}}
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font>
                                </strong>

                                <font size="-1" style="color: black">{{$unApprovedPost->created_at}} </font>
                            </h4>
                        </span>
                        <h4>
                            <strong>{{$unApprovedPost->title}}</strong>
                            <div>
                        </h4>
                        <h5>{{$unApprovedPost->content}}</h5>
                        <a href="{{route('admin.control.approve', ['post_id'=>$unApprovedPost->id])}}">
                            <font size="-1" style="color: blue">Approve</font>
                        </a>
                        <a style="margin-left:10%" href="{{route('deletePost', ['post_id'=>$unApprovedPost->id])}}" onclick="return confirm('Are you sure?')">
                            <font size="-1" style="color: red">Delete</font>
                        </a>

                    </li>
                    @endforeach
                </ul>


            </div>
        </div>

    </div>
    @endsection