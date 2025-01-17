<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Track Details</title>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<span>{{ __('Tracks') }}</span>
<a href="{{ route('tracks.create') }}" class="btn btn-primary">Add Track</a>
</div>

<div class="card-body">
@if (session('success'))
<div class="alert alert-success" role="alert">
{{ session('success') }}
</div>
@endif

<table class="table">
<thead>
<tr>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($tracks as $track)
<tr>
<td>
<img src="{{ asset('images/'.$track->img) }}" alt="{{ $track->name }}" width="50" class="img-fluid img-thumbnail">
</td>
<td>{{ $track->name }}</td>
<td>{{ $track->description }}</td>
<td>
<a href="{{ route('tracks.edit', $track) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('tracks.destroy', $track) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
