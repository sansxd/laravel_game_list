<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //que es lo que hace esto, dropea los datos de la tabla
        Game::truncate();
        File::truncate();
        //luego, hace 30 juegos y cada juego tiene 1 File y lo crea
        Game::factory()
            ->count(30)
            ->hasFile(1)
            ->create();
    }
}
