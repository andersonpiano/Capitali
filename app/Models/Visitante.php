<?php

// app/Models/Visitante.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'tipo',
        'motivo',
        'setor',
        'responsavel',
        'data_visita',
    ];
}

