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
                            @include('components.tables.orders')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


