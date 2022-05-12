<?php

use Illuminate\Support\Facades\DB;

function misses($idEstudante,$idDisciplina) {
 
    $result = DB::select("SELECT tbl_presenca.*,tbl_aula.* FROM tbl_presenca,tbl_aula WHERE tbl_presenca.fk_tbl_aula_codigo_aula = tbl_aula.codigo_aula AND tbl_aula.fk_codigo_curso_disciplina = ? AND tbl_presenca.fk_tbl_estudante_codigo_estudante = ?", [$idDisciplina,$idEstudante]);

    $totalAula = DB::select("SELECT * FROM tbl_aula WHERE fk_codigo_curso_disciplina = ? AND tema_aula <> ?", [$idDisciplina,"Aula justificada"]);

    

    if(count($totalAula) > 0) {
        $avg = number_format((count($result)*100) / count($totalAula),1);
    }
   
    if($avg >= 75){
        echo "<span class='text-success'>(".$avg."%)</span>";
        return;
    }

    echo "<span class='text-danger'>(".$avg."%)</span>";
}