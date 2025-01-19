<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ $track->name }} - Details</title>
</head>
<body>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('images/'.$track->img) }}" class="card-img-top" alt="{{ $track->name }}" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title">{{ $track->name }}</h3>
                    <p class="card-text">{{ $track->description }}</p>

                    <div class="mt-4">
                        <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Back to Tracks</a>
                        <a href="{{ route('tracks.edit', $track) }}" class="btn btn-primary">Edit Track</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
