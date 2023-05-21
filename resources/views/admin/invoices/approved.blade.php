@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h4>{{ __('Approved Invoices') }}</h4>
        </div>
        <x-alerts.info>   </x-alerts.info>
        <div class="my-2">
            <a href="{{ route('invoices.create') }}" class="btn btn-success" >
                Create New Invoice
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
                                    <th>Invoice No</th>
                                    <th>Customer Name</th>
                                    <th>Invoice Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>#{{ $invoice->id }}</td>
                                        <td>{{ $invoice->order->customer->name}}</td>
                                        <td>{{ date('d/m/Y', strtotime($invoice->created_at))}}</td>
                                        <td>{{ $invoice->description}}</td>
                                        <td>${{ $invoice->order->order_total}}</td>
                                        <td>
                                            @if($invoice->status == 0)
                                                <span class="badge rounded-1 p-2 bg-warning">{{ __('Pending') }}</span>
                                            @elseif($invoice->status = 1)
                                                <span class="badge rounded-1 p-2 bg-success">{{ __('Approved') }}</span>
                                            @else
                                                <span class="badge rounded-1 p-2 bg-danger">{{ __('Not Approved') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-md-start">
                                                @if($invoice->status == 0)
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approve">
                                                        <i class="bi bi-bag-check"></i>
                                                    </button>
                                                    @include('components.modals.approve')
                                                @endif
                                                @if($invoice->status != 1)
                                                    <div>
                                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Customer Name</th>
                                    <th>Invoice Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
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


