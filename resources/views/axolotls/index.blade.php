
<!DOCTYPE html>
<html>
<head>
    <title>Axolotl List</title>
</head>
<body>
    <h1>All Axolotls</h1>

    <ul>
        @foreach ($axolotls as $axolotl)
            <li>
                <a href="/axolotls/{{ $axolotl->id }}">
                    {{ $axolotl->name }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>

