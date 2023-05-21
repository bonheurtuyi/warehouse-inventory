<div class="form-group">
    <div class="mb-3">
        <label for="inputProduct" class="form-label">Choose product</label>
        <select class="form-select" name="product_id" id="inputProduct">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="inputCustomer" class="form-label">Choose customer</label>
        <select class="form-select" name="customer_id" id="inputCustomer">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="inputQuantity" class="form-label">Quantity</label>
        <input type="number" name="qty" class="form-control" value="{{ old('qty', optional($order ?? null)->quantity) }}" id="inputQuantity" aria-describedby="inputQuantity">
    </div>


    @if($errors->any())
        <div class="mb-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
