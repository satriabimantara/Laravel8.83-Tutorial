<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);


Route::get("/about", function () {
    return view('about');
});


// Contoh menampilkan data langsung dari route dalam bentuk JSON
Route::get("/hello", function () {
    $myData = [
        'message' => "Hello World!"
    ];
    // return $myData; // otomatis sudah dalam JSON
    return response()->json($myData);
});


// Contoh menampilkan informasi untuk proses debugging
Route::get('/debug', function () {
    $myData = [
        'message' => 'Hello World!'
    ];
    ddd($myData);
});


// Contoh routing dan HTTP Methods


Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
