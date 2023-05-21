<table id="example" class="table table-striped data-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Category</th>
        <th>In Qty</th>
        <th>Out Qty</th>
        <th>Stock</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->unit->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td><span class="badge rounded-2 px-3 py-2 bg-success">{{ $product->inQty }}</span></td>
            <td><span class="badge rounded-2 px-3 py-2 bg-info">{{ $product->outQty }}</span></td>
            <td><span class="badge rounded-2 px-3 py-2 bg-primary">{{ $product->quantity }}</span></td>
            <td>
                @if($product->quantity == 0)
                    <span class="badge rounded-1 p-2 bg-danger">{{ __('Out of Stock') }}</span>
                @else
                    <span class="badge rounded-1 p-2 bg-success">{{ __('In stock') }}</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Category</th>
        <th>In Qty</th>
        <th>Out Qty</th>
        <th>Stock</th>
        <th>Status</th>
    </tr>
    </tfoot>
</table>
