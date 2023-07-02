<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
</head>
<body>
    <nav>
        <a href="{{ route('game.index') }}">Home</a>
        <a href="{{ route('game.create') }}">New Game</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
