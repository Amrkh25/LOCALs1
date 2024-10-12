{{-- {{-- @extends('layouts.header')

@section('section')
    <div class="container">
        <h1>Your Cart</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ isset($item['name']) ? $item['name'] : 'Unknown Product' }}</td>
                    <td>${{ isset($item['price']) ? $item['price'] : '0.00' }}</td>
                    <td>{{ isset($item['quantity']) ? $item['quantity'] : '0' }}</td>
                    <td>${{ isset($item['price']) && isset($item['quantity']) ? $item['price'] * $item['quantity'] : '0.00' }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                        <td>${{ number_format($totalPrice, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <h3>Total: ${{ array_sum(array_column($cart, 'price')) }}</h3>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection --}}
@extends('layouts.header')

@section('section')
    <div class="container">
        <h1>Your Cart</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if( count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                        <td>${{ number_format($totalPrice, 2) }}</td>
                    </tr>
                </tfoot>
            </table>

            <h3>Total: ${{ number_format($totalPrice, 2) }}</h3>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
    <div class="text-center">
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" style="background-color: green; border-color: green;">Checkout</button>
        </form>
    </div>
@endsection

