@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Dashboard') }}</h4>
        </div>
        <div class="main-content">
            <div class="header bg-gradient pb-8 mb-5">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row">
                            <x-cards.dashboard-cards title="Products" content="{{ count($products) }}" link="{{ route('products.index') }}"/>
                            <x-cards.dashboard-cards title="Customers" content="{{ $customers }}" link="{{ route('customers.index') }}"/>
                            <x-cards.dashboard-cards title="Orders" content="{{ $orders }}" link="{{ route('orders.index') }}"/>
                            <x-cards.dashboard-cards title="Invoices" content="{{ $invoices }}" link="{{ route('invoices.index') }}"/>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Stock Status
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('components.tables.stock-report')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Area Chart Example
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Area Chart Example
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
@endsection


