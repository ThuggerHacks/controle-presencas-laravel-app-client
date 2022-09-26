<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginDepartamento extends Model
{
    use HasFactory;
    protected $table = "tbl_usuario_departamento";
    protected $primaryKey = "codigo_usuario_departamento";
    protected $fillable = [
        "email_usuario_departamento",
        "senha_usuario_departamento"
    ];
    public $timestamps = false;
}
