@extends('layouts.footer')
@section('section2')
@include('layouts.headerdas')
<div class="container">
    <h1>Orders List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                    <td>{{ $order->total_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
