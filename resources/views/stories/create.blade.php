<!DOCTYPE html>
<html>
<head>
    <title>Create a Story</title>
</head>
<body>
    <h1>Write a Story About {{ $axolotl->name }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/axolotls/{{ $axolotl->id }}/stories">
        @csrf

        <label for="title">Story Title:</label>
        <input type="text" id="title" name="title"
               value="{{ old('title') }}" required>

        <br><br>

        <label for="content">Story:</label>
        <textarea id="content" name="content"
                  rows="6" required>{{ old('content') }}</textarea>

        <br><br>

        <button type="submit">Save Story</button>
    </form>

    <p>
        <a href="/axolotls/{{ $axolotl->id }}">
            Back to {{ $axolotl->name }}
        </a>
    </p>
</body>
</html>
