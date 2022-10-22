<?php

    use Illuminate\Support\Facades\DB;

    function isAbsent($studentId,$lessonId){
        $check = DB::select("SELECT * FROM tbl_presenca WHERE fk_tbl_aula_codigo_aula = ? AND fk_tbl_estudante_codigo_estudante = ?  LIMIT 1", [$lessonId,$studentId]);

        $isAbsent = true;
        foreach ($check as $linha) {
            $isAbsent = false;
        }

        return $isAbsent;
    }