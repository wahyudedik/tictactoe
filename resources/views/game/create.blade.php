@extends('layouts.app')

@section('content')
    <h1>Create New Game</h1>

    <form action="{{ route('game.store') }}" method="POST">
        @csrf
        <label for="player_x">Player X:</label>
        <input type="text" name="player_x" id="player_x" required><br>

        <label for="player_o">Player O:</label>
        <input type="text" name="player_o" id="player_o" required><br>

        <button type="submit">Start Game</button>
    </form>
@endsection
