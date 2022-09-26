<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    public function index(){
        return view('estudante.home');
    }

    public function subject(){
        return view('estudante.subject');
    }

    public function message(){
        return view('message');
    }
}
