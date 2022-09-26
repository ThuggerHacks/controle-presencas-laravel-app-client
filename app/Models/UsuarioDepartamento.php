<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioDepartamento extends Model
{
    use HasFactory;

    protected $table = "tbl_usuario_departamento";
    protected $fillable = [
        "nome_usuario_departamento",
        "codigo_usuario_departamento",
        "senha_usuario_departamento",
        "email_usuario_departamento",
        "celular_usuario_departamento",
        "fk_tbl_departamento_codigo_departamento"
    ];
    protected $primaryKey = "codigo_usuario_departamento";

    public $timestamps = false;
}
