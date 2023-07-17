<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraineeController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TraineeController::class,'index']);
Route::get('trainees',[TraineeController::class,'index']);
Route::post('trainees',[TraineeController::class,'store']);
Route::get('fetch-trainees', [TraineeController::class, 'fetchstudent']);
Route::get('edit-trainee/{id}', [TraineeController::class, 'edit']);
Route::put('update-trainee/{id}', [TraineeController::class, 'update']);
Route::delete('delete-trainee/{id}', [TraineeController::class, 'destroy']);
