@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Orders') }}</h4>
        </div>
        <x-alerts.info>   </x-alerts.info>
        <div class="my-2">
            <a href="{{ route('orders.create') }}" class="btn btn-success" >
                Make new Order
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Product name</th>
                                    <th>Customer</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Totals</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone}}</td>
                                        <td>{{ $order->address}}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-md-start">
{{--                                                <div>--}}
{{--                                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-warning">{{ __('Edit') }}</a>--}}

{{--                                                </div>--}}
                                                <div>
                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Product name</th>
                                    <th>Customer</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Totals</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


