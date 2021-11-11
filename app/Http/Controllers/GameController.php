<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Http\Resources\GameResource;

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
            $game = $this->game::all();
            $data = GameResource::collection($game);
            return $data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(GameRequest $request)
    {
        try {
            $validated = $request->validated();
            if ($validated) {
                $data = $this->game->create($request->all());
                return new GameResource($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(Game $game)
    {
        try {
            $data = new GameResource($game);
            return $data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(GameRequest $request, Game $game)
    {
        try {
            $game->update($request->all());
            return response()->json($game, 200);
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
