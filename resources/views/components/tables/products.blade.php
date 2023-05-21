<table id="example" class="table table-striped data-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Code</th>
        <th>Category</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->created_at->diffForHumans() }}</td>
            <td>
                @if($product->quantity == 0)
                    <span class="badge rounded-1 p-2 bg-warning">{{ __('Out of Stock') }}</span>
                @else
                    <span class="badge rounded-1 p-2 bg-success">{{ __('In stock') }}</span>
                @endif
            </td>
            <td>
                <div class="d-flex gap-2 justify-content-md-start">
                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning">{{ __('Edit') }}</a>
                    </div>
                    @if($product->quantity == 0)

                    @else
                        <div>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Code</th>
        <th>Category</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </tfoot>
</table>
