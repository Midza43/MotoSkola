<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatiController;
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
        return view('dashboard');
    })->name('dashboard');

    Route::get('kandidati', [KandidatiController::class, 'index'] 
            
        )->name('kandidati');

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




    
});

