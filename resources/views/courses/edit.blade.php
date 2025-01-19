<x-layout>
    <x-slot:title>Edit Course - {{ $course->name }}</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Course</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Current Logo</label><br>
                                <img src="{{ asset('images/'.$course->logo) }}" width="100"><br>
                                <label>New Logo</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Course</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

