<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-bootstrap />
    <title>{{ $title ?? 'Course Management' }}</title>
</head>
<body>
    <x-navigation />

    <main class="py-4">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
