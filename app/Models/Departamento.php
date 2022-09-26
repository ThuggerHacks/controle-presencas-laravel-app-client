<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "tbl_departamento";
    protected $fillable = [
        "codigo_departamento",
        "fk_tbl_faculdade_codigo_faculdade",
        "nome_departamento"
    ];
    protected $primaryKey = "codigo_departamento";

    public $timestamps = false;
}
