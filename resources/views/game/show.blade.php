@extends('layouts.app')

@section('content')
    <h1>Game ID: {{ $game->id }}</h1>

    <p>
        Player X: {{ $game->player_x }} <br>
        Player O: {{ $game->player_o }} <br>
        Status: {{ $game->status }} <br>
        Created At: {{ $game->created_at }}
    </p>

    <!-- Tampilkan papan permainan Tic Tac Toe di sini -->

    <form action="{{ route('game.play', $game->id) }}" method="POST">
        @csrf
        <label for="position">Enter Position (1-9):</label>
        <input type="number" name="position" id="position" min="1" max="9" required><br>

        <button type="submit">Play</button>
    </form>
@endsection
