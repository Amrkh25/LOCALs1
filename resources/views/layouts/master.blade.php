<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title> Locals</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap.css')}} />
      <!-- font awesome style -->
      <link href={{asset('css/font-awesome.min.css')}} rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href={{asset('css/style.css')}} rel="stylesheet" />
      <!-- responsive style -->
      <link href={{asset('css/responsive.css')}} rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="170" height="70" src="images/1.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">category <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                            @foreach ($categories as $item )
                        <li><a href="/products/{{ $item->id }}">{{$item->name}}</a></li>
                        @endforeach
                       </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/products">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('cart.index') }}">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                              </svg>
                           </a>
                        </li>
                        <li>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        @auth
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Profile
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link" style="padding: 0; display: inline; cursor: pointer;">
                                                            Logout
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Sign In
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                                </div>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                        </li>
                     </ul>
                </nav>
            </div>
         </header>
         <!-- end header section -->
         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Sale 20% Off
                                    </span>
                                    <br>
                                    On Everything
                                 </h1>
                                 <p>
                                    We know that you support your local Egyptian industry, which is why we have provided you with everything you need. There's no need to worry about the source of the product anymore.
                                </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Sale 20% Off
                                    </span>
                                    <br>
                                    On Everything
                                 </h1>
                                <p>
                                    Don't worry about online payments; you can shop as you like and only pay when you receive your order and review it thoroughly.
                                </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Sale 20% Off
                                    </span>
                                    <br>
                                    On Everything
                                 </h1>
                                 <p>
                                    We provide you with the highest quality in Egyptian industries, and because we love you, we have brought discounts just for you.
                                </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>

     @yield('content')
     <footer class="bg-light text-dark pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="logo_footer">
                        <a href="#"><img width="120" src="images/1.png" alt="Logo" /></a>
                    </div>
                    <div class="information_f mt-3">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Menu</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">Products</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">About</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark">Facebook</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">Twitter</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">Instagram</a></li>
                        <li class="mb-2"><a href="#" class="text-dark">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

 <!-- footer end -->
 <div class="cpy_">
    <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

       Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
 </div>
 <!-- jQery -->
 <script src={{asset('js/jquery-3.4.1.min.js')}}></script>
 <!-- popper js -->
 <script src={{asset('js/popper.min.js')}}></script>
 <!-- bootstrap js -->
 <script src={{asset('js/bootstrap.js')}}></script>
 <!-- custom js -->
 <script src={{asset('js/custom.js')}}></script>
</body>
</html>
