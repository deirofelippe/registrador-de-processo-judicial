<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'numeroProcesso',
        'autor',
        'vara'
    ];
}
