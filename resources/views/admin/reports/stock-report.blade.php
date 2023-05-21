@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Products') }}</h4>
        </div>
        <x-alerts.info>   </x-alerts.info>
        <div class="my-2">
            <a href="{{ route('products.create') }}" class="btn btn-success" >
                Add New Product:
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('components.tables.stock-report')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


