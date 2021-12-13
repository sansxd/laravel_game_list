<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image('public/storage/images',400,300, null, false);
        $imageName = basename($image);
        return [
            'name' => $imageName,
            'path' => 'storage/images/'.$imageName,
        ];
    }
}
