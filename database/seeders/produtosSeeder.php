<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produtosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('produto_imagens')->truncate();
        Produto::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $faker = \Faker\Factory::create('pt_BR');
        $tamanhos = ['PP', 'P', 'M', 'G', 'GG', '38', '39', '40', '41', '42'];

        $imagens = $this->listarImagensProdutos();
        $imgCount = count($imagens);
        $categorias = Categoria::all();

        $imgIndex = 0;
        foreach ($categorias as $categoria) {
            for ($i = 1; $i <= 30; $i++) {
                $imagem = $imagens[$imgIndex % $imgCount];
                $imgIndex++;
                Produto::create([
                    'categoria_id' => $categoria->id_catg,
                    'nome' => $this->nomeProduto($faker, $categoria->nome, $i),
                    'tamanho' => $faker->randomElement($tamanhos),
                    'descricao' => $faker->paragraph(3),
                    'imagem' => $imagem,
                    'valor' => $faker->randomFloat(2, 19.90, 299.90),
                    'ativo' => 'S',
                    'destaque' => $faker->boolean(20) ? 'S' : 'N',
                ]);
            }
        }

    }

    private function listarImagensProdutos(): array
    {
        $paths = glob(public_path('imagens/produtos/*.{png,jpg,jpeg,webp}'), GLOB_BRACE) ?: [];

        if (empty($paths)) {
            return ['imagens/produtos/placeholder.png'];
        }

        $images = array_map(function ($path) {
            return 'imagens/produtos/' . basename($path);
        }, $paths);

        shuffle($images);
        return $images;
    }

    private function nomeProduto(\Faker\Generator $faker, string $categoria, int $index): string
    {
        $produto = $faker->randomElement([
            'Camiseta', 'Camisa', 'Calça', 'Jaqueta', 'Tênis',
            'Vestido', 'Saia', 'Moletom', 'Boné', 'Relógio',
            'Bolsa', 'Óculos', 'Tênis Casual', 'Polo',
        ]);

        return "{$produto} {$categoria} {$index}";
    }
}
