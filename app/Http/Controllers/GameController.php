<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->paginate(10);
        return view('game.index', compact('games'));
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'player_x' => 'required',
            'player_o' => 'required',
        ]);

        $game = new Game;
        $game->player_x = $request->player_x;
        $game->player_o = $request->player_o;
        $game->save();

        return redirect()->route('game.show', $game->id);
    }

    public function show(Game $game)
    {
        return view('game.show', compact('game'));
    }

    public function play(Request $request, Game $game)
    {
        $request->validate([
            'position' => 'required',
        ]);

        $position = $request->position;
        $board = str_split($game->board);

        // Periksa apakah posisi sudah diisi atau tidak
        if ($board[$position - 1] !== '-') {
            return redirect()->back()->with('error', 'Position already filled.');
        }

        // Periksa giliran pemain yang sedang bermain
        if ($game->status === 'ongoing') {
            if ($game->turn === 'X') {
                $board[$position - 1] = 'X';
                $game->turn = 'O';
            } else {
                $board[$position - 1] = 'O';
                $game->turn = 'X';
            }
        } else {
            return redirect()->back()->with('error', 'Game already finished.');
        }

        // Periksa kondisi kemenangan
        $winningPositions = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Baris
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Kolom
            [0, 4, 8], [2, 4, 6] // Diagonal
        ];

        foreach ($winningPositions as $positions) {
            [$a, $b, $c] = $positions;

            if ($board[$a] !== '-' && $board[$a] === $board[$b] && $board[$b] === $board[$c]) {
                $game->status = $board[$a] === 'X' ? 'player_x_win' : 'player_o_win';
                break;
            }
        }

        // Periksa apakah permainan seri
        if ($game->status === 'ongoing' && !in_array('-', $board)) {
            $game->status = 'draw';
        }

        // Update papan permainan
        $game->board = implode('', $board);
        $game->save();

        return redirect()->route('game.show', $game->id);
    }

}
