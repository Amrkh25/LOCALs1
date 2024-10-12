@extends('layouts.footer')
@section('section2')
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
      <title>Locals</title>
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
    <header class="header_section">
        <div class="container">
           <nav class="navbar navbar-expand-lg custom_nav-container ">
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
                 </ul>
              </div>
           </nav>
        </div>
     </header>
<div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="bg-primary text-white p-3">
        <h3 class="text-center">Dashboard</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/add-product" class="nav-link text-white">Add Product</a>
            </li>
            <li class="nav-item">
                <a href="/add-category" class="nav-link text-white">Add Category</a>
            </li>
            <li class="nav-item">
                <a href="/show-orders" class="nav-link text-white">Recent Orders</a>
            </li>
            <li class="nav-item">
                <a href="/show-contact" class="nav-link text-white">contacts</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h5>Total Users</h5>
                        <p class="display-4">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Total Products</h5>
                        <p class="display-4">{{$productsCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5>Total Orders</h5>
                        <p class="display-4">{{$ordersCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5>Total Profit</h5>
                        <p class="display-4">${{$totalProfit}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forms and Recent Orders Sections -->
        <div id="recentOrders" class="mt-5">
            <h4>Recent 20 Orders</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                        <td>{{ $order->total_price }}$</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
