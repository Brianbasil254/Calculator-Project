<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'operand1',  // Make sure this is included
        'operand2',
        'operation',
        'result',
    ];

    protected $casts = [
        'operand1' => 'double',
        'operand2' => 'double',
        'result' => 'double',
    ];
}