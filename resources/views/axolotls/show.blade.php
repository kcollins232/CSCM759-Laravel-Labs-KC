
<!DOCTYPE html>
<html>
<head>
    <title>Axolotl Details</title>
</head>
<body>
    <h1>{{ $axolotl->name }}</h1>

    <p>Colour: {{ $axolotl->colour }}</p>
    <p>Age: {{ $axolotl->age }}</p>

    <p>
        <a href="/axolotls/{{ $axolotl->id }}/stories/create">
            Write a Story
        </a>
    </p>

    <p>
        <a href="/axolotls">Back to All Axolotls</a>
    </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>

