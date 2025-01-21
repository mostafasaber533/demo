<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">{{ $track->name }}</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Track Details:</h2>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="{{ asset('images/' . $track->img) }}"
                     alt="{{ $track->name }}"
                     class="w-full h-32 object-cover rounded mb-4">
                <p class="text-gray-600">{{ $track->description }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Courses in this Track:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($track->courses as $course)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <img src="{{ asset('images/' . $course->logo) }}"
                             alt="{{ $course->name }}"
                             class="w-full h-32 object-cover rounded mb-4">
                        <h3 class="font-semibold">{{ $course->name }}</h3>
                        <p class="text-gray-600">{{ $course->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
