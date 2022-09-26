<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresencaFuncionario extends Model
{
    use HasFactory;

    protected $table = "tbl_presenca_docente_mobile";
    public $timestamps = false;
    protected $primaryKey = "codigo_presenca";
    protected $fillable = [
        "data_presenca",
        "codigo_funcionario",
        "entrada",
        "saida"
    ];
}
