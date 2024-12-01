<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /** @use HasFactory<\Database\Factories\PetFactory> */
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'idcliente', 
        'nome', 
        'raca', 
        'observacao', 
        'valorpacote', 
        'frequencia', 
        'taxidog'
    ];

    // Disable the model timestamps
    public $timestamps = false;
}
