<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    use HasFactory;
    public $timestamps = false; // desconsiderar o campo ->updated_at


   protected $fillable =[
        'id_log',
        'user_id',
        'produto_id',
        'date_create',
        'qtd_acessos',
        'ip',
        'descricao'
    ];


}
