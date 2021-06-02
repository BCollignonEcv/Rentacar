<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeVehiculeController;
use App\Http\Controllers\VehiculeController;

use App\Models\TypeVehicule;
use App\Models\TypeBoite;
use App\Models\TypeCarburant;
use App\Models\Vehicule;


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

/**************** Vehicules ******************/

Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules');
Route::get('/vehicule', [VehiculeController::class, 'create'])->name('createVehicule');
Route::post('/vehicule', [VehiculeController::class, 'store'])->name('storeVehicule');
Route::get('/vehicule/{id}', [VehiculeController::class, 'show'])->name('showVehicule');


/**************** Reservations ******************/

Route::get('/reservations', function () {
    $data->reservations = Reservation::all();
    return view('reservations', );
})->middleware(['auth'])->name('reservations');

Route::get('/reservations/all', function () {
    $data->reservations = TypeVehicule::all();
    return view('reservations', );
})->middleware(['auth'])->name('reservations');



Route::get('/search', function () {
    $data = (object) array();
    $data->typeVehicules = TypeVehicule::all();
    $data->typeBoites = TypeBoite::all();
    $data->typeCarburants = TypeCarburant::all();

    return view('search', ['data' => $data]);
})->middleware(['auth'])->name('search');

require __DIR__.'/auth.php';
