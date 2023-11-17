<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TodosControleur;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function (){
    return view("welcome", ["title" => "Coucou"]);
});

Route::get('/ping', [PingPongControleur::class, 'ping']);
Route::get('/pong', [PingPongControleur::class, 'pong']);
Route::get('/todo', [TodosControleur::class, 'index']);
Route::post('/api/todo/create', [TodosControleur::class, 'create']);
Route::post('/api/todo/update/{id}', [TodosControleur::class, 'update']);
Route::post('/api/todo/delete/{id}', [TodosControleur::class, 'delete']);

Route::get('/todo/create', [TodosControleur::class, 'index']);
