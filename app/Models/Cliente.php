<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'Nome',
        'Endereco',
        'Telefone',
        'Observacao',
        'DiaBanho',
        'ordemtaxidog',
        'ativo'
    ];

    // Disable the model timestamps
    public $timestamps = false;
}
