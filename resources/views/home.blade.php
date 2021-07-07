@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Add Blog Post
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('store')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Photo</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-header text-center font-weight-bold">
            My Posts
        </div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($myposts as $mypost)
                <li class="list-group-item">
                    <span class="badge">

                        <strong>
                            <font size="+1" style="color: blue">{{$mypost->user->name}}</font>
                            </h4>
                        </strong>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        {{$mypost->created_at}}
                    </span>
                    <h4>
                        <strong>{{$mypost->title}}</strong>
                        <div>
                    </h4>
                    <h5>{{$mypost->content}}</h5>
                    <a style="margin-left: 900px" href="{{route('editPost', ['post_id'=>$mypost->id])}}">
                        <font size="-1" style="color: blue">Edit</font>
                    </a>
                    <a href="{{route('deletePost', ['post_id'=>$mypost->id])}}" onclick="return confirm('Are you sure?')">
                        <font size="-1" style="color: red">Delete</font>
                    </a>
                </li>
                @endforeach
            </ul>
            <div style="margin-left: 943px"> {{ $myposts->links("pagination::bootstrap-4") }}</div>
        </div>
    </div>    

</div>
@endsection