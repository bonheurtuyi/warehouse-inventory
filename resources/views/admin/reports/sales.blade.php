@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Generate Sales report:') }}</h4>
        </div>
        <x-alerts.info>   </x-alerts.info>
            <div class="">
                <form class="row g-2" method="GET" action="{{ route('sales.results') }}">
                    @csrf
                    @method('HEAD')
                    <div class="col-md-3 mb-3">
                        <label for="startDate">Start Date</label>
                        <input name="date1" type="date" id="startDate" class="form-control">
                        @error('date1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="endDate">End Date</label>
                        <input name="date2" type="date" id="endDate" class="form-control">
                        @error('date2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
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


