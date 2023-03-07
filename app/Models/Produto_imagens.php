<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto_imagens extends Model
{
    use HasFactory;

    protected $table    = 'produto_imagens';

    protected $primaryKey = 'prod_id';

    protected $fillable = [
        'produto_id','nome_img', 'created_at', 'updated_at'
    ];

}
