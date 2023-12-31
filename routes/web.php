<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatiController;
use App\Http\Controllers\MotoriController;
use App\Http\Controllers\InstruktoriController;
use App\Http\Controllers\StatistikaController;
use App\Http\Controllers\WeatherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
)->group(function () {

    Route::get('/', function () {
        $weatherController = new WeatherController();
        $weatherData = $weatherController->getWeather();
        return view('dashboard',[
            'weatherData' => $weatherData]);
    })->name('dashboard');

    Route::get('kandidati', [KandidatiController::class, 'index'] 
            
        )->name('kandidati');

    Route::get('motori', [MotoriController::class, 'index'] 
            
        )->name('motori');

    Route::get('instruktori', [InstruktoriController::class, 'index'] 
            
        )->name('instruktori');

    Route::post('/instruktori', [InstruktoriController::class, 'dodjelaKandidata']
    
        )->name('dodjela.kandidata');

    Route::get('/dodaj_kandidata', [KandidatiController::class, 'create'] 
        
        )->name('dodaj_kandidata');

    Route::post('/dodaj_kandidate', [KandidatiController::class, 'dodaj_kandidate'] 
        
        )->name('dodaj_kandidate');

    Route::get('/izmjeni_kandidata/{id}', [KandidatiController::class, 'izmjeni']

        )->name('izmjeni_kandidata');

    Route::delete('/izbrisi_kandidata/{id}', [KandidatiController::class, 'izbrisi']

        )->name('izbrisi_kandidata');

    Route::get('/uredi_kandidata/{id}', [KandidatiController::class, 'uredi']

        )->name('uredi_kandidata');

    Route::put('/azuriraj_kandidata/{id}', [KandidatiController::class, 'azuriraj']
        
        )->name('azuriraj_kandidata');

    Route::post('/dodaj_fajl', [KandidatiController::class, 'dodaj_fajl']

        )->name('dodaj_fajl');

    Route::get('statistika', [StatistikaController::class, 'index'] 
            
        )->name('statistika');




    
});

