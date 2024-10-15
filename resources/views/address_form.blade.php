@extends('layouts.header')

@section('section')
    <div class="container">
        <h1>Add Shipping Address</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('cart.processCheckout') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="governorate">Governorate:</label>
                <input type="text" name="governorate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" name="street" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
        </form>

    </div>
@endsection
