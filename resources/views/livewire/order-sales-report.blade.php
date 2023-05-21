@extends('layouts.app')

@section('content')
<div>
    <form wire:submit.prevent="searchOrders">
        <div class="mb-3">
            <label for="startDate">Start Date</label>
            <input wire:model.lazy="startDate" type="date" id="startDate" class="form-control">
            @error('startDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="endDate">End Date</label>
            <input wire:model.lazy="endDate" type="date" id="endDate" class="form-control">
            @error('endDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-striped data-table mt-3">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Order Date</th>
            <th>Total Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                <td>{{ $order->total_amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
