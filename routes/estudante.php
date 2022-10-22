<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;

Route::middleware('student.auth')->group(function () {
    Route::get('/student/home', [EstudanteController::class,"index"])->name("student.home");

    Route::get('/student/subject/{cadeira?}', [EstudanteController::class,"subject"])->name("student.subject");

    Route::post('/student/subject/post', [EstudanteController::class,"subjectPost"])->name("student.subject.post");

    Route::post('/student/messages', [EstudanteController::class,"message"])->name("student.msg");

    Route::post('/student/subject', [EstudanteController::class,"subjectSearch"])->name("student.subject.search");

});