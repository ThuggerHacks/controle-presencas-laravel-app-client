<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;

Route::get('/teacher/home', [DepartamentoController::class,"index"])->name("teacher.home");

Route::get('/teacher/subject', [DocenteController::class,"subject"])->name("teacher.subject");

Route::get('/teacher/check', [DocenteController::class,"check"])->name("teacher.check");

Route::get('/teacher/presence', [DocenteController::class,"presence"])->name("teacher.presence");
