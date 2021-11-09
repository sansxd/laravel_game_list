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
                // $data = auth()->user()->game()->create($request->all());
                $data = $this->game()->create($request->all());
                return new GameResource($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(Game $game)
    {
        $data = new GameResource($game);
        return $data;
    }

    public function update(GameRequest $request, Game $game)
    {
        $game->update($request->all());
        return response()->json($game, 200);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(null,204);
    }
}
