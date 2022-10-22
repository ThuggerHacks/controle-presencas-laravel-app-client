<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;

Route::get("/",function(){
    return redirect()->route("login");
})->name("home");

Route::get('/login', function () {
    return view('login');
})->name("login");


Route::get('/messages', function () {
    return view('message');
})->name("message");


Route::get("/logout",function(Request $request){
    
    session()->forget("teacher");
    session()->forget("student");
    session()->forget("dep");
    return redirect()->route("login.all");
})->name("logout");

Route::post("/login",[EstudanteController::class,"login"])->name("login.all");