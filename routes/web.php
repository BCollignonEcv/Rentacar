<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeVehiculeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ControleConformiteController;
use App\Http\Controllers\ControleAPController;
use App\Http\Controllers\ConfigurationController;

use App\Models\TypeVehicule;
use App\Models\TypeBoite;
use App\Models\TypeCarburant;
use App\Models\Vehicule;
use App\Models\ControleConformite;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', function () {
    $data = (object) array();
    $data->typeVehicules = TypeVehicule::all();
    $data->typeBoites = TypeBoite::all();
    $data->typeCarburants = TypeCarburant::all();

    return view('search', ['data' => $data]);
})->middleware(['auth'])->name('search');

/**************** Vehicules ******************/

Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules');
Route::get('/vehicule', [VehiculeController::class, 'create'])->name('createVehicule');
Route::post('/vehicule', [VehiculeController::class, 'store'])->name('storeVehicule');
Route::get('/vehicule/{id}', [VehiculeController::class, 'show'])->name('showVehicule');


/**************** Controles ******************/
Route::get('/vehicule/{id_vehicule}/controleConformite', [ControleConformiteController::class, 'createControleConformite'])->name('createControleConformite');
Route::post('/controleConformite', [ControleConformiteController::class, 'store'])->name('storeControleConformite');
Route::get('/controleConformite/{id}', [ControleConformiteController::class, 'index'])->name('controleConformites');


/**************** Reservations ******************/
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::get('/reservations/{îd}', [ReservationController::class, 'index'])->name('userReservations');
Route::post('/reservation', [ReservationController::class, 'store'])->name('storeReservation');
Route::get('/reservation/{îd}', [ReservationController::class, 'index'])->name('showReservation');

/**************** Configuration ******************/

Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');

require __DIR__.'/auth.php';
