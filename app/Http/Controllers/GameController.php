<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGameRequest;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;

class GameController extends Controller
{
    protected $game;
    public function __construct(Game $game)
    {
        $this->game = $game;
    }
    public function index()
    {
        try {
            return GameResource::collection($this->game::all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(GameRequest $request)
    {
        try {
            return new GameResource($this->game->create($request->validated()));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(Game $game)
    {
        try {
            return new GameResource($game);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(GameRequest $request, Game $game)
    {
        try {
            $game->update($request->validated());
            return new GameResource($game);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Game $game)
    {
        try {
            $game->delete();
            return response()->json([
                'message' => 'delete success'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
