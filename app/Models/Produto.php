<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //protected $guarded = ['prod_id']; ?? guarded ?
    protected $primaryKey = 'id_prod';

    protected $fillable =[
        'categoria_id',
        'nome',
        'tamanho',
        'descricao',
        'imagem',
        'valor',
        'ativo',
        'destaque',
     ];
            //< Relacionamento que tem 1: > <hasMany> < Relacionamento que tem :N >
     public function Produto_hasMany_Produto_imagens(){
                              //< Relacionamento >         ,<Chave Estrangeira> , <Chave Primaria>
        return $this->hasMany('App\Models\Produto_imagens', 'produto_id'       ,'id_prod');

     }

}
