@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Make New Order') }}</h4>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf
                            @include('components.forms.order')
                            <div class="mb-3">
                                <input type="submit" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


