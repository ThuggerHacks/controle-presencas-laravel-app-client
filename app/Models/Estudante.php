<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $table = "tbl_estudante";
    protected $fillable = [
        "nome_estudante",
        "codigo_estudante",
        "email_estudante",
        "senha_estudante",
        "fk_tbl_curso_codigo_curso"
    ];
    protected $primaryKey = "codigo_docente";

    public $timestamps = false;
}
