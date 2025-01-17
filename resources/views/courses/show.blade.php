<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Courses Details</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $course->name }}</h2>
                </div>
                <div class="card-body">
                    <img src="{{ asset('images/'.$course->logo) }}" class="img-fluid mb-3" style="max-width: 200px">
                    <p><strong>Description:</strong></p>
                    <p>{{ $course->description }}</p>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

