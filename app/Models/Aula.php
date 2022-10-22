<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $table = "tbl_aula";
    public $timestamps = false;
    protected $fillable = [
        "codigo_aula",
        "data_aula",
        "tema_aula",
        "fk_codigo_curso_disciplina"
    ];
    
    
}
