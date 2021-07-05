@extends('frontend.headerFooter')

@section('blogDetailsContent')

<section class="banner banner-secondary" id="top">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="banner-caption">
          <div class="line-dec"></div>
          <h2>{{$post[0]->title}}</h2>

          <h4><i class="fa fa-user"></i>{{$post[0]->user->name}} &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i> {{$post[0]->created_at}} &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-eye"></i> {{$post[0]->view}}</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<main>
  <section class="featured-places">
    <div class="container">
      <div class="form-group">
        <img src="{{('img/blog-image-fullscren-1-1920x700.jpg')}}" class="img-responsive" alt="">
      </div>

      <br>

      <h2>{{$post[0]->title}}</h2>

      <p>{{$post[0]->content}}</p>

      <br>

      <!-- <h4>Lorem ipsum dolor sit amet.</h4>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, id quia maxime quas, unde sunt quaerat non! Sapiente aperiam, voluptatum voluptas recusandae qui veniam numquam voluptate ipsa earum quia dicta? Non praesentium quod vel ratione rerum dolor animi eligendi nisi, dolores culpa atque, deserunt veritatis incidunt quibusdam cumque obcaecati sit.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas unde tenetur dolorem eos esse, voluptatum iste iure voluptas dolor quo sit beatae. Odio laudantium eligendi ipsa pariatur eveniet doloremque quis voluptas veritatis repellendus laborum aspernatur sapiente mollitia totam fugit quod saepe earum, iste voluptatibus, aut aperiam iure omnis! Id libero quibusdam nisi fugiat, optio necessitatibus vitae magni incidunt ea tenetur?</p> -->

      <br>
      <br>

      <ul class="list-group">
        @foreach($comments as $comment)
        <li class="list-group-item">
        <span class="badge">{{$comment->created_at}}</span>
          <h4><strong>{{$comment->user->name}}</strong></h4>
          <h5>{{$comment->comment}}</h5>
        </li>
        @endforeach
      </ul>

      <div class="text-center"> {{ $comments->links("pagination::bootstrap-4") }}</div>


      <h4>Leave a comment</h4>

      <div class="row">
        <div class="col-md-8">
          <form id="contact" action="{{route('postComment', ['post_id'=>$post[0]->id])}}" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="comment" type="text" class="form-control" id="name" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <div class="blue-button">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-4">
          <div class="left-content">

            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur. Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>

            <br>

            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection