<?php

use Illuminate\Support\Facades\Route; // <--- AGREGA ESTA LÍNEA
use App\Http\Controllers\VideojuegoController;

Route::get('/', [VideojuegoController::class, 'index']);
