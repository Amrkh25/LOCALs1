@extends('layouts.master')
@section('content')
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>categories</span>
               </h2>
            </div>

            @foreach ($categories as $item )
            @if ($loop->iteration % 3 == 1) <!-- يبدأ صف جديد كل 3 عناصر -->
        <div class="row">
            @endif
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="/products/{{ $item->id }}" class="option1">
                            {{$item->name}}
                           </a>
                        </div>
                     </div>
                     <a href="/products/{{ $item->id }}"><div class="img-box">
                        <img style="max-height: 200px !important; min-height: 200px !important; object-fit: cover;"  src="{{ url( $item->image_path) }}" alt="no">
                     </div> </a>
                     <div class="detail-box">

                        <h5>
                          {{$item->name}}
                        </h5>
                        <p style="font-size: 12px; color: rgb(65, 63, 63);">{{ $item->description }}</p> <!-- الفقرة الجديدة -->
                     </div>
                  </div>
              </div>

               @endforeach
      </section>
      <!-- end product section -->

      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Recent Products
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                @foreach ($recentProducts as $index => $product)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                   <div class="box col-lg-10 mx-auto">
                      <div class="img_container">
                         <div class="img-box">
                            <div class="img_box-inner">
                               <img src="{{ url( $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                         </div>
                      </div>
                      <div class="detail-box">
                         <h5>
                            {{ $product->name }}
                         </h5>
                         <h6>
                            ${{ $product->price }}
                         </h6>
                         <p>
                            {{ Str::limit($product->description, 100) }}
                         </p>
                      </div>
                   </div>
                </div>
             @endforeach
                  </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->
      @endsection


