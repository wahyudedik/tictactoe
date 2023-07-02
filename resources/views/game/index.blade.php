@extends('layouts.app')

@section('content')
    <h1>List of Games</h1>

    @foreach ($games as $game)
        <p>
            Game ID: {{ $game->id }} <br>
            Player X: {{ $game->player_x }} <br>
            Player O: {{ $game->player_o }} <br>
            Status: {{ $game->status }} <br>
            Created At: {{ $game->created_at }}
        </p>
    @endforeach

    {{ $games->links() }}
@endsection
