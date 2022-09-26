<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = "tbl_docente";
    protected $primaryKey = "codigo_docente";
    protected $fillable = [
        "email_docente",
        "senha_docente"
    ];
    public $timestamps = false;
}
