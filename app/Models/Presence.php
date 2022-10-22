<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "tbl_presenca";
    protected $fillable = [
        "fk_tbl_aula_codigo_aula",
        "fk_tbl_estudante_codigo_estudante"
    ];
}
