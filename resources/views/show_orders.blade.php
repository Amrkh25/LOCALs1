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
                <th>Governorate</th>
                <th>City</th>
                <th>Street</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user ? $order->user->name : 'N/A' }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->address ? $order->address->governorate : 'N/A' }}</td> <!-- عرض المحافظة -->
                    <td>{{ $order->address ? $order->address->city : 'N/A' }}</td> <!-- عرض المدينة -->
                    <td>{{ $order->address ? $order->address->street : 'N/A' }}</td> <!-- عرض الشارع -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
