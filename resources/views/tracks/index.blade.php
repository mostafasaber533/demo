<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tracks List</title>
</head>
<body>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Tracks') }}</h4>
                    <a href="{{ route('tracks.create') }}" class="btn btn-primary">Add Track</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($tracks as $track)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('images/'.$track->img) }}" class="card-img-top" alt="{{ $track->name }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $track->name }}</h5>
                                    <p class="card-text">{{ Str::limit($track->description, 100) }}</p>

                                    <div class="mt-3">
                                        <a href="{{ route('tracks.show', $track) }}" class="btn btn-info btn-sm">View Details</a>
                                        <a href="{{ route('tracks.edit', $track) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('tracks.destroy', $track) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
