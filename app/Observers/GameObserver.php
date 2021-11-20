<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GameObserver
{
    /**
     * Handle the Game "created" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function created(Game $game)
    {
        Cache::forget('games');
    }
    public function updated(Game $game)
    {
        Log::info('Update Game: '.$game);

        Cache::forget('games');
    }
    public function deleted(Game $game)
    {
        Cache::forget('games');
    }

}
