<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;

Route::middleware('teacher.auth')->group(function () {
    Route::get('/teacher/home', [DocenteController::class,"index"])->name("teacher.home");

    Route::get('/teacher/subject/{cadeira?}', [DocenteController::class,"subject"])->name("teacher.subject");

    Route::get('/teacher/check/{id_disciplina?}/{id_aula?}', [DocenteController::class,"check"])->name("teacher.check");

    Route::get('/teacher/presence/{cadeira?}', [DocenteController::class,"presence"])->name("teacher.presence");

    Route::get("/teacher/subjects/{id?}",[DocenteController::class,"subjectByCourse"]);

    Route::post("/search/teacher",[DocenteController::class,"searchTeacherSubject"])->name("search.teacher.all");

    Route::post("/addtopic",[DocenteController::class,"addTopic"]);

    Route::post("/addpresence",[DocenteController::class,"addPresence"]);
    
    Route::get("/studentInfo/{id?}",[DocenteController::class,"studentInfo"]);

    Route::post("/teacher/message",[DocenteController::class,"sendMail"])->name("teacher.msg");

    Route::post("/teacher/subject/search",[DocenteController::class,"searchSubject"])->name("teacher.subject.search");

    Route::post("/teacher/me/search",[DocenteController::class,"searchMe"])->name("teacher.me.search");

});
