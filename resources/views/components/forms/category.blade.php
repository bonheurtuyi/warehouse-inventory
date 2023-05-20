<div class="form-group">
    <div class="mb-3">
        <label for="inputName" class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name?? null) }}" id="inputName" aria-describedby="inputName">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control">
            {{ old('description', $category->description?? null) }}
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
