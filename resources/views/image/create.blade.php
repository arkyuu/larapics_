<h1>Upload new image</h1>

<form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="file">File</label>
        <input type="file" name="file" id="file">
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
</form>
