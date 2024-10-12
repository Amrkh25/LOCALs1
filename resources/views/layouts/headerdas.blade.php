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
                           <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/add-category">Add Category</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/add-product">Add Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/show-orders">Orders List</a>
                        </li>
                        <li>
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
    @yield('child')
