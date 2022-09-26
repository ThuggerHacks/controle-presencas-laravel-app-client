<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = "tbl_docente";
    protected $fillable = [
        "nome_docente",
        "celular_docente",
        "codigo_docente",
        "senha_docente",
        "email_docente",
        "contratado",
        "salario_docente",
        "nivel_docente"
    ];
    protected $primaryKey = "codigo_docente";

    public $timestamps = false;

}
