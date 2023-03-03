<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //protected $guarded = ['prod_id'];
    protected $primaryKey = 'id_prod';

    protected $fillable =[
        'prod_id',
        'categoria_id',
        'nome',
        'tamanho',
        'descricao',
        'imagem',
        'valor',
        'ativo',
        'destaque',
];



}
