<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Aqui um exemplo dos TRES tipos de Inserts!!
     * @return void
     */
    public function run()
    {
         $categoria = new Categoria();
         $categoria->nome   = 'Women';
         $categoria->imagem = 'admin/images/categorias/vestido15-20-30.png';
         $categoria->save();

         $arrCategorias =[
            'nome'   => 'Men',
            'imagem' => 'admin/images/categorias/captura-de-tela-de-2022-11-01-16-31-35.png'
         ];
         Categoria::create($arrCategorias);

         DB::table('categorias')->insert(
            array( 'nome' => 'Acessories','imagem' => 'admin/images/categorias/captura-de-tela-de-2023-03-04-14-59-04.png')
        );
    }
}
