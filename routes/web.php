<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/resto' , [RestoController::class, "index"]);

Route::get('/home',[RestoController::class, "home"]);    

Route::get("/list", [RestoController::class, "list"]);

Route::get("/add" , [RestoController::class ,"add"]);

Route::post("/addRecord" , [RestoController::class, "add_record"]) ;

Route::get("/delete/{id}" , [RestoController::class ,"delete"]);

Route::get("/edit/{id}" , [RestoController::class ,"edit"]);

Route::post("/editRecord/{id}" , [RestoController::class, "edit_record"]) ;


require __DIR__.'/auth.php';
