@extends('frontend.headerFooter')

@section('blogContent')

<section
      class="banner banner-secondary"
      id="top"
      style="background-image: url(img/banner-image-1-1920x300.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="banner-caption">
              <div class="line-dec"></div>
              <h2>Blog</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <main>
      <section class="featured-places">
        <div class="container">
          <div class="row">
            <div id="app">
              <post-thumbnail-component :posts="{{$posts}}"/>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-12">
              <div class="form-group">
                <h4>Blog Search</h4>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="basic-addon2"
                  />

                  <span class="input-group-addon"
                    ><a href="#"><i class="fa fa-search"></i></a
                  ></span>
                </div>
              </div>

              <br />

              <div class="form-group">
                <h4>Lorem ipsum dolor sit amet</h4>
              </div>

              <p>
                <a href="#"
                  >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Quos quae animi sint.</a
                >
              </p>
              <p>
                <a href="#"
                  >Non, magni, sequi. Explicabo illum quas debitis ut hic
                  possimus, nesciunt mag!</a
                >
              </p>
              <p>
                <a href="#"
                  >Vatae expedita deleniti optio ex adipisci animi, iusto
                  tempora.
                </a>
              </p>
              <p>
                <a href="#"
                  >Soluta non modi dolorem voluptates. Maiores est, molestiae
                  dolor laborum.</a
                >
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection