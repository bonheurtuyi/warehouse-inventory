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
            <td>#{{ $order->id }}</td>
            <td>{{ date('d/m/Y', strtotime($order->created_at))}}</td>
            <td>{{ $order->product->name}}</td>
            <td>{{ $order->customer->name}}</td>
            <td>{{ $order->qty}}</td>
            <td>${{ $order->product->price}}</td>
            <td>${{ $order->order_total}}</td>
            <td>
                @if($order->status == 0)
                    <span class="badge rounded-1 p-2 bg-warning">{{ __('Pending') }}</span>
                @elseif($order->status = 1)
                    <span class="badge rounded-1 p-2 bg-success">{{ __('Approved') }}</span>
                @else
                    <span class="badge rounded-1 p-2 bg-danger">{{ __('Not Approved') }}</span>
                @endif
            </td>
            <td>
                <div class="d-flex gap-2 justify-content-md-start">
                    @if($order->status == 0)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approve">
                            <i class="bi bi-bag-check"></i>
                        </button>
                        @include('components.modals.approve')
                    @endif
                    @if($order->status != 1)
                        <div>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
