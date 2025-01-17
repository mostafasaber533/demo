<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Track Edit</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="card">
    <div class="card-header">{{ __('Edit Track') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('tracks.update', $track) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $track->name) }}" required>
    @error('name')
        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $track->description) }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="img" class="form-label">Image</label>
    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
    <img src="{{ asset('images/'.$track->img) }}" alt="{{ $track->name }}" class="mt-2" width="100">
    @error('img')
        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
        </div>
    </div>
</div>
@<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
