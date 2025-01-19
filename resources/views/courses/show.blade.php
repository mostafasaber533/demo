<x-layout>
    <x-slot:title>Course - {{ $course->name }}</x-slot>
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
</x-layout>

