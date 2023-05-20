@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Edit Unit:') }}</h4>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('units.update', $unit->id) }}">
                            @csrf
                            @method('PUT')
                            <x-forms.unit></x-forms.unit>
                            <div class="mb-3">
                                <input type="submit" value="UPDATE" class="btn btn-outline-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


