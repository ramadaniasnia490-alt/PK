<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

Route::apiResource('specialists', SpecialistController::class);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('categories', CategoryController::class);