<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|----------------
| Web Routes    |
|----------------
*/

Route::get('/{any?}', PagesController::class)->where('any', '.*');

