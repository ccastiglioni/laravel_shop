<?php

namespace Database\Seeders;

use App\Models\Produto_imagens;
use Illuminate\Database\Seeder;

class produto_imagensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrPrd_img1 =[
            'produto_id'   => '1',
            'nome_img'     => 'imagens/produtos/333captura-de-tela-de-2022-11-01-16-34-34.png',
         ];
        $arrPrd_img2 =[
            'produto_id'   => '2',
            'nome_img'     => 'imagens/produtos/393bonejacare2022-11-24-08-42-45.png',
         ];
        $arrPrd_img3 =[
            'produto_id'   => '3',
            'nome_img'     => 'imagens/produtos/142sandalia10-48-41.png',

         ];
        $arrPrd_img4 =[
            'produto_id'   => '4',
            'nome_img'     => 'imagens/produtos/566captura-de-tela-de-2023-03-06-15-43-22.png',

         ];
        $arrPrd_img5 =[
            'produto_id'   => '5',
            'nome_img'     => 'imagens/produtos/194captura-de-tela-de-2023-03-06-15-41-23.png',

         ];
        $arrPrd_img6 =[
            'produto_id'   => '6',
            'nome_img'     => 'imagens/produtos/338relogio-34-35.png',

         ];

         Produto_imagens::create($arrPrd_img1);
         Produto_imagens::create($arrPrd_img2);
         Produto_imagens::create($arrPrd_img3);
         Produto_imagens::create($arrPrd_img4);
         Produto_imagens::create($arrPrd_img5);
         Produto_imagens::create($arrPrd_img6);
    }

/* TODOS
prod_id	produto_id	nome_img
    1	        1	    imagens/produtos/333captura-de-tela-de-2022-11-01-16-34-34.png
    2	        1	    imagens/produtos/707captura-de-tela-de-2022-11-01-16-32-12.png
    3	        1	    imagens/produtos/396captura-de-tela-de-2022-11-01-16-31-35.png
    4	        2	    imagens/produtos/393bonejacare2022-11-24-08-42-45.png
    5	        2	    imagens/produtos/791bonejacare111-04-08-42-37.png
    6	        2	    imagens/produtos/472bonejacare-04-08-42-27.png
    7	        3	    imagens/produtos/142sandalia10-48-41.png
    8	        3	    imagens/produtos/99sandalia10-48-30.png
    9	        3	    imagens/produtos/207sandalia10-48-21.png
    10	        4	    imagens/produtos/566captura-de-tela-de-2023-03-06-15-43-22.png
    11	        4	    imagens/produtos/515captura-de-tela-de-2023-03-06-15-43-10.png
    12	        4	    imagens/produtos/207captura-de-tela-de-2023-03-06-15-42-56.png
    13	        5	    imagens/produtos/194captura-de-tela-de-2023-03-06-15-41-23.png
    14	        5	    imagens/produtos/780captura-de-tela-de-2023-03-06-15-41-10.png
    15	        6	    imagens/produtos/338relogio-34-35.png
    16	        6	    imagens/produtos/354relogio13-34-20.png
*/
}
