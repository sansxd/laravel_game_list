<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Requests\UploadFileRequest;
use App\Http\Resources\GameResource;
use App\Models\File;
use App\Models\Game;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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
            $games = $this->game->all();
            return Cache::remember('games', 22 * 60, fn () => GameResource::collection($games));
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
    public function imageUploadPost(UploadFileRequest $request)
    {
        try {
            $fileUpload = new File();
            if ($request->hasFile('image') and $request->file('image')->isValid()) {
                //se obtiene el archivo image
                $imageFile = $request->file('image');
                //se crea un nombre
                $imageFileName =  time() . '.' . $imageFile->extension();
                $imageStorage = Storage::putFileAs('public/images', $imageFile, $imageFileName);
                $url_path = Storage::url($imageStorage);

                // $fileUpload->create(['name' => $imageFileName, 'path' => $url_path]);
                $fileUpload->name = $imageFileName;
                $fileUpload->path = $url_path;
                $fileUpload->save();

                return response()->json(['id' => $fileUpload->id]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
