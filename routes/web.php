<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí solo vamos a redirigir la raíz de la aplicación hacia el panel de control de Filament.
| Filament manejará sus propias rutas internamente.
|
*/

Route::get('/', function () {
    // Redirige a Filament
    return Redirect::to('/trastienda');
});