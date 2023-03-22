<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class produtosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrPrd1 =[
            'categoria_id'   => '2',
            'nome'       => 'Camisa Masculina Bege 2 ',
            'tamanho'    => 'M',
            'descricao'  => 'Camisa At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi',
            'imagem'     => 'imagens/produtos/333captura-de-tela-de-2022-11-01-16-34-34.png',
            'valor'      => '40.9' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-03-06 18:31:58'
         ];

        $arrPrd2 =[
            'categoria_id'   => '2',
            'nome'       => 'Boné azul Masculino',
            'tamanho'    => 'P',
            'descricao'  => 'Boné Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'imagem'     => 'imagens/produtos/393bonejacare2022-11-24-08-42-45.png',
            'valor'      => '50.9' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-03-06 18:31:58'
         ];
        $arrPrd3 =[
            'categoria_id'   => '1',
            'nome'       => 'Sandalia feminia',
            'tamanho'    => '39-40',
            'descricao'  => 'Sandalia Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'imagem'     => 'imagens/produtos/142sandalia10-48-41.png',
            'valor'      => '100.9' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-03-06 18:31:58'
         ];
        $arrPrd4 =[
            'categoria_id'   => '3',
            'nome'       => 'Tênis vermelho',
            'tamanho'    => '39',
            'descricao'  => 'Tênis vermelho Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'imagem'     => 'imagens/produtos/566captura-de-tela-de-2023-03-06-15-43-22.png',
            'valor'      => '120.80' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-04-06 18:31:58'
         ];
        $arrPrd5 =[
            'categoria_id'   => '3',
            'nome'       => 'Camisa lisa',
            'tamanho'    => 'G',
            'descricao'  => 'Camisa vermelho Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'imagem'     => 'imagens/produtos/194captura-de-tela-de-2023-03-06-15-41-23.png',
            'valor'      => '48.80' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-01-06 18:31:58'
         ];
        $arrPrd6 =[
            'categoria_id'   => '3',
            'nome'       => 'Relogio feminio',
            'tamanho'    => 'G',
            'descricao'  => 'Relógios de pulso CRRJU Novo Design Homens 3-Hand og Quartz Display Classic s Watch. High Quality Heavy Big Face Dial, Movimento Japan Seiko, bateria Sony Leading Edge Fashion, e relógio muito elegante fácil de combinar com roupas. Também o torna um grande presente para a família ou amigos. Especificação: Diâmetro do mostrador: 43mm Largura da banda: 22mm Espessura do mostrador: 10mm Perímetro de desgaste: 240mm Peso líquido: 135g profundidade impermeável: 30M Pacote Inclui: 1 * Homens Relógio 1 * Caixa de presente',
            'imagem'     => 'imagens/produtos/338relogio-34-35.png',
            'valor'      => '68.86' ,
            'ativo'      => 'S',
            'destaque'   => 'S',
            'created_at' => '2023-02-12 18:31:58'
         ];

         Produto::create($arrPrd1);
         Produto::create($arrPrd2);
         Produto::create($arrPrd3);
         Produto::create($arrPrd4);
         Produto::create($arrPrd5);
         Produto::create($arrPrd6);

    }
/*   id_prod categoria_id	nome	tamanho	descricao	imagem	valor	ativo	destaque	created_at	updated_at
        2	 2	    Boné azul Masculiono	P	Boné Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.	imagens/produtos/393bonejacare2022-11-24-08-42-45.png	50,9	S	S	2023-03-06 18:34:55	2023-03-06 18:34:55
        3	 1	    Sandalia feminia	39-40	Sandalia Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.	imagens/produtos/142sandalia10-48-41.png	100,5	S	S	2023-03-06 18:36:08	2023-03-06 18:36:08
        4	 2 	    Tênis vermelho	39-40	Tênis vermelho ,Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.	imagens/produtos/566captura-de-tela-de-2023-03-06-15-43-22.png	251,8		S	2023-03-06 18:47:33	2023-03-06 18:47:33
        5	 2	    Camisa lisa	G	Camisa lisa.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.	imagens/produtos/194captura-de-tela-de-2023-03-06-15-41-23.png	201,45	S	S	2023-03-07 02:57:05	2023-03-07 02:57:05
        6	 3 	    Relogio feminio A47	G	Relógios de pulso CRRJU Novo Design Homens 3-Hand og Quartz Display Classic s Watch. High Quality Heavy Big Face Dial, Movimento Japan Seiko, bateria Sony Leading Edge Fashion, e relógio muito elegante fácil de combinar com roupas. Também o torna um grande presente para a família ou amigos. Especificação: Diâmetro do mostrador: 43mm Largura da banda: 22mm Espessura do mostrador: 10mm Perímetro de desgaste: 240mm Peso líquido: 135g profundidade impermeável: 30M Pacote Inclui: 1 * Homens Relógio 1 * Caixa de presente	imagens/produtos/338relogio-34-35.png	504,1		S	2023-03-07 12:01:02	2023-03-07 12:01:02
 */
}
