<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;

Route::get('/student/home', [EstudanteController::class,"index"])->name("student.home");

Route::get('/student/subject', [EstudanteController::class,"subject"])->name("student.subject");

Route::get('/student/messages', [EstudanteController::class,"message"])->name("student.message");

