<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        return view('docente.home');
    }

    public function subject(){
        return view('docente.subject');
    }

    public function check(){
        return view('docente.check');
    }

    public function presence(){
        return view('docente.me');
    }
}
