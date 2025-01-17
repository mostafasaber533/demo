<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Details</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Student Details</h5>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($student->image) }}" alt="Student Image" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th width="200">ID</th>
                                <td>{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ ucfirst($student->gender) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
