@extends('layouts.header')
@section('section')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Product Grid</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="heading_container heading_center">
        <h2>
            Our <span>products</span>
        </h2>
    </div>
    <div class="row">
        @foreach ($products as $item)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="box">
                <div class="img-box position-relative">
                    <img src="{{ url($item->image_path) }}" alt="{{ $item->name }}" class="img-fluid">
                    @if(Auth::check())
                    <form action="{{ route('cart.add', $item->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    @endif
                </div>
                <div class="detail-box">
                    <h4>
                        {{ $item->name }}
                    </h4>
                    <h5>
                        {{ $item->description }}
                    </h5>
                    <h6>{{ number_format($item->price, 2) }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')

@endsection
