<div class="form-group">
    <div class="mb-3">
        <label for="inputName" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', optional($product ?? null)->name) }}" id="inputName" aria-describedby="inputName">
    </div>
    <div class="mb-3">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', optional($product ?? null)->price) }}" id="inputPrice" aria-describedby="inputPrice">
    </div>
    <div class="mb-3">
        <label for="inputQuantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', optional($product ?? null)->quantity) }}" id="inputQuantity" aria-describedby="inputQuantity">
    </div>
    <div class="mb-3">
        <label for="inputUnit" class="form-label">Choose unit</label>
        <select class="form-select" name="unit_id" id="inputUnit">
            @foreach($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="inputCode" class="form-label">Product Code</label>
        <input type="text" name="code" class="form-control" value="{{ old('code', optional($product ?? null)->code) }}" id="inputCode" aria-describedby="inputCode">
    </div>
    <div class="mb-3">
        <label for="inputCategory" class="form-label">Choose category</label>
        <select class="form-select" name="category_id" id="inputCategory">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="inputImage" class="form-label">Choose Image</label>
        <input type="file" name="image" class="form-control" id="inputImage">
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
