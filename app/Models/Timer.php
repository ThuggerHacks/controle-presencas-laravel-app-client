<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $table = "tbl_timer";
    public $timestamps = false;
    protected  $fillable = [
        "hora",
        "id_presenca"
    ];
}
