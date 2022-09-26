<?php

use Illuminate\Support\Facades\Route;


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
    
    session()->forget("user");
    return redirect()->route("dep.login");
})->name("logout");

