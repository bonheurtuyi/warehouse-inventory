<div class="form-group">
    <div class="mb-3">
        <label for="inputOrder" class="form-label">Choose order:</label>
        <select class="form-select" aria-label="inputOrder" name="order_id">
            <option selected>{{ old('order_id', $invoice->order->id ?? 'Select Order Id') }}</option>
            @foreach($orders as $order)
                <option value="{{ $order->id }}">#{{ $order->id }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Invoice description:</label>
        <textarea class="form-control" name="description" id="description" rows="3">
            {{ old('description', $invoice->description ?? null) }}
        </textarea>
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
