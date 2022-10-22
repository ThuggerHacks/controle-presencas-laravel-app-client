<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = "tbl_horario";
    protected $fillable = [
        "inicio",
        "termino",
        "dia_semana",
        "codigo_",
        "fk_codigo_curso_disciplina"
    ];
    public $timestamps = false;
    protected $primaryKey = "codigo_";
}
