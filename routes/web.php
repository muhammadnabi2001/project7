<?php

use App\Http\Controllers\UniversitetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/',[UniversitetController::class,'index']);
Route::get('/createuniver',[UniversitetController::class,'create']);
