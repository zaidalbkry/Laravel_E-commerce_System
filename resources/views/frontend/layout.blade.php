<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Site Metas -->
    <title>Berla Store</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo.png" />
    <link rel="icon" href="images/logo.png" />
    <!-- ✅ تحميل ملفات CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('css-custom-files')

</head>

<body>





    @if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-dismissible fade show text-center rounded" role="alert">
        <strong>{{ $msg }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            &times;
        </button>
    </div>
    @endif


    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger fw-bold fs-5 text-center rounded">
        {{ $error }}
    </div>
    @endforeach
    @endif



    <!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: initial !important;">
        <div class="container">
            <a class="navbar-brand" href="/" style="display: flex; justify-content: space-between; align-items: center;">
                <img width="55" height="55" src="{{ asset('images/logo.png') }}" alt="" />
                <span style="font-weight: bold; padding-top: 10px; font-size: 32px; margin-left: 10px;">Berla</span>
            </a>

            <!-- ✅ نموذج البحث داخل الهيدر -->
            <form method="GET" action="{{ route('product.search') }}" class="d-flex ml-auto" style="max-width: 300px;">
                <input class="form-control me-2" type="text" name="query" placeholder="Find a product..." required>
               <button class="custom-search-btn" type="submit">Search</button>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item d-flex nav-link" style="cursor: pointer" onclick="redirectToCart()">
                        Cart (<span id="cart-count" class="p-0 m-0 nav-link">0</span>)
                    </div>
                    <li class="nav-item"><a class="nav-link" href="/all-products">All Products</a></li>
                                    <li class="nav-item">
                                        @auth
<a href="{{ route('client.notifications') }}" class="btn btn-light">
    🔔
    @if(auth()->user()->unreadNotifications->count() > 0)
        <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
    @endif
</a>
@endauth

</li>
                    @guest
                    <li class="nav-item"><a class="nav-link" href="/login">Login / Register</a></li>
                    @endguest
                    @auth
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                    <li class="nav-item"><a class="nav-link" href="/admin">Dashboard</a></li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>

        @auth
        <button id="toggle-sidebar" class="btn btn-dark" style="background: #cfa671">☰ Menu</button>
        <div id="sidebar" class="sidebar">
            <button id="close-sidebar" class="close-menu" style="color: black">x</button>
            <ul>
                <li class="nav-item"><a class="nav-link" href="/my-profile">My Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/my-favorite">My Favorite</a></li>
                <li class="nav-item"><a class="nav-link" href="/my-orders">My Orders</a></li>

            </ul>
        </div>
        @endauth
    </nav>
</header>

    <!-- End header -->

    @yield('content')

    <!-- Start Contact info -->
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Phone</h4>
                        <p class="lead">+963 000 888 777</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">Berla@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">Damascus, Syria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->

    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <ul>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="/about-us">About Us</a></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3>About Us</h3>
                    <p>
                        Discover a world of exquisite flavors and luxurious food products
                        at Berla store. Berla is the perfect destination for food
                        enthusiasts looking for an exceptional shopping experience that
                        combines quality and variety.
                    </p>
                    <p><a href="/about-us" style="color: white">Learn more about us</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Opening hours</h3>
                    <p><span class="text-color">Friday: </span>Closed</p>
                    <p><span class="text-color">Sat-Sun :</span> 8:PM - 10PM</p>
                    <p><span class="text-color">Mon-Tue :</span> 6:Am - 10PM</p>
                    <p><span class="text-color">Wed-Thu :</span> 6:Am - 10PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Contact Us</h3>
                    <p><a href="/contact-us" style="color: white">Send us a message now</a></p>
                    <p class="lead">Damascus, Syria</p>
                    <p class="lead"><a href="#">+963 999 888 777</a></p>
                    <p><a href="#">Berla@gmail.com</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Subscribe</h3>
                    <div class="subscribe_form">



                        <form class="subscribe_form" action="{{ route('new-number.store') }}" method="POST">

                            @csrf
                            <input name="phone_number" id="subs-email" class="form_input" placeholder="Phone Number..." type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
                            <button type="submit" class="submit">SUBSCRIBE</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <ul class="list-inline f-social">
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">
                            All Rights Reserved. &copy; 2024
                            <a href="#">Berla Store</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- ALL PLUGINS -->
    <script src="{{ asset('js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('js/images-loded.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('js/form-validator.min.js') }}"></script>
    <script src="{{ asset('js/contact-form-script.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateCartCount();
        });

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById("cart-count").innerText = cart.length;
        }

        function redirectToCart() {
            window.location.href = "/my-card";
        }
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Close the sidebar when the close button is clicked
        document.getElementById('close-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
        });

    </script>
    @yield('js-custom-files')

</body>

</html>
