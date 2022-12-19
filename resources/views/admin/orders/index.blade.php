@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Transaksi List
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date Transcation</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Product</th>
                        <th>Shipping</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d M y H:i:s', strtotime($order->order_date)); }}</td>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->customer_first_name }}</td>
                        <td>{{ $order->customer_phone ? $order->customer_phone : "-" }}</td>
                        <td>
                            <span class="badge badge-success">Rp. {{ number_format($order->base_total_price)
                                }}</span>
                        </td>
                        <td>
                            @foreach($order->orderItems as $produc)
                            <span class="badge badge-primary"> {{ $produc->name }}</span>
                            @endforeach
                        </td>

                        <td>{{ $order->shipping_courier }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.products.show', $order->id) }}" class="btn btn-warning">
                                    <i class="fa fa-eye"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection