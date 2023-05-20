<div class="form-group">
    <div class="mb-3">
        <label for="inputName" class="form-label">Customer Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', optional($customer ?? null)->name) }}" id="inputName" aria-describedby="inputName">
    </div>
    <div class="mb-3">
        <label for="inputPhone" class="form-label">Phone NUmber</label>
        <input type="number" name="phone" class="form-control" value="{{ old('phone', optional($customer ?? null)->phone) }}" id="inputPhone" aria-describedby="inputPhone">
    </div>
    <div class="mb-3">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', optional($customer ?? null)->address) }}" id="inputAddress" aria-describedby="inputAddress">
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
