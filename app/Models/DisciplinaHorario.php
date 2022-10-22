<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaHorario extends Model
{
    use HasFactory;
    protected $table = "tbl_disciplina_horario";
    protected $fillable = [
        "fk_tbl_horario_codigo_",
        "fk_codigo_curso_disciplina"
    ];
    public $timestamps = false;
}
