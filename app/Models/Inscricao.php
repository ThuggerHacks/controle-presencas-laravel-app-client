<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tbl_disciplina_estudante";
    protected $fillable = [
        "fk_codigo_disciplina",
        "fk_codigo_estudante"
    ];
}
