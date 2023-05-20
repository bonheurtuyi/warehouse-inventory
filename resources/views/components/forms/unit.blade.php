<div class="form-group">
    <div class="mb-3">
        <label for="inputName" class="form-label">Unit Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', optional($unit ?? null)->name) }}" id="inputName" aria-describedby="inputName">
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
