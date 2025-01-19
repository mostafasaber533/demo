<x-layout>
    <x-slot:title>All Courses</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Courses</h2>
                <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td><img src="{{ asset('images/'.$course->logo) }}" width="50"></td>
                            <td>{{ Str::limit($course->description, 100) }}</td>
                            <td>
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
