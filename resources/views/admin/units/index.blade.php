@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Units') }}</h4>
        </div>
        <x-alerts.info>   </x-alerts.info>
        <div class="my-2">
            <a href="{{ route('units.create') }}" class="btn btn-success" >
                Add New Unit:
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td>{{ $unit->id }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-md-start">
                                                <div>
                                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-outline-warning">{{ __('Edit') }}</a>
                                                </div>
                                                <div>
                                                    <form action="{{ route('units.destroy', $unit->id) }}" method="POST">
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
                                    <<th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
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


