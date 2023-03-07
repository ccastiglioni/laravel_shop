<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_catg';

    protected $fillable = [
        'nome',
        'imagem',
    ];

    public function categoria_hasmany_produtos($slug=''){

        return $this->hasMany('App\Models\Produto','categoria_id','id_catg');//->where('nome',$slug);

    }

}
