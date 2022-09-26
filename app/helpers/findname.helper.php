<?php

    use App\Models\Docente;

    function getNome($id){

        $docente = Docente::find($id);

        return $docente['nome_docente'];
    }