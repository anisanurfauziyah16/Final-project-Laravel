<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastsController;
use App\Http\Controllers\genresController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [DashboardController::class,"home"]);
Route::get('/Daftar', [AuthController::class,"register"]);
Route::post('/welcome',[AuthController::class,"welcome"]);


Route::get('/data-table', function(){
    return view('partials.data-table');
});

Route::middleware(['auth'])->group(function () {
    //CRUD CASTS
//CREATE DATA
Route::get('/casts/create',[CastsController::class,"create"]);
Route::post('/casts',[CastsController::class,"store"]);

//R => Read Data
Route::get('/casts',[CastsController::class,"index"]);
Route::Get('/casts/{casts_id}', [CastsController::class,"show"]);

//R => Update Data
Route::get('/casts/{casts_id}/edit', [CastsController::class, "edit"]);
Route::put('/casts/{casts_id}', [CastsController::class, "update"]);

//D => Delete Data
Route::delete('/casts/{casts_id}',[CastsController::class, "destroy"]);
//CRUDM => gendres
Route::resource('genres', genresController::class);

Route::post('/reviews/{film_id}', [ReviewController::class, "store"]);
});

Route::get('/table', function(){
    return view('partials.table');

    
});


//CRUD => films
Route::resource('film', FilmsController::class);
Auth::routes();



