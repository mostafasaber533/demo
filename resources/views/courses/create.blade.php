<x-layout>
    <x-slot:title>Create Course</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Create New Course</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Course</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


