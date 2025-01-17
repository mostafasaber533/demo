<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>User Details</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User Details</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['age'] }}</td>
                </tr>
            </tbody>
        </table>
         <a href="/users" class="btn btn-primary">Back to Users List</a>
    </div>
</body>
</html> 
