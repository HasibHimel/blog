<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PHPJabbers.com | Free Blog Website Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/hero-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="{{asset('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900')}}" rel="stylesheet">

    <script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>

<body>

    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.html">
                            <div class="logo">
                                <img src="{{asset('img/logo.png')}}" alt="Venue Logo">
                            </div>
                        </a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="{{route('home')}}">Home</a></li>

                                <li><a href="{{route('blog')}}">Blog</a></li>

                                <li class='active'><a href="{{route('aboutUs')}}">About Us</a></li>

                                <li><a href="{{route('team')}}">Authors</a></li>

                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                @if(Auth::user()->isAdmin == 0)
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                @else
                                <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                                @endif
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>

    @yield('aboutUsContent')
    @yield('blogContent')
    @yield('blogDetailsContent')
    @yield('contactContect')
    @yield('indexContent')
    @yield('teamContent')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="{{asset('img/footer_logo.png')}}" alt="Venue Logo">
                        </div>
                        <p>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellustea dictumst.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{route('home')}}"><i class="fa fa-stop"></i>Home</a></li>
                                    <li><a href="{{route('aboutUs')}}"><i class="fa fa-stop"></i>About</a></li>
                                    <li><a href="{{route('team')}}"><i class="fa fa-stop"></i>Team</a></li>
                                    <li><a href="{{route('contact')}}"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="faq.html"><i class="fa fa-stop"></i>FAQ</a></li>
                                    <li><a href="testimonials.html"><i class="fa fa-stop"></i>Testimonials</a></li>
                                    <li><a href="blog.html"><i class="fa fa-stop"></i>Blog</a></li>
                                    <li><a href="terms.html"><i class="fa fa-stop"></i>Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li><span>Phone:</span><a href="#">+1 333 4040 5566</a></li>
                            <li><span>Email:</span><a href="#">contact@company.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>