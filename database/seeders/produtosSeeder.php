<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $categorias = Categoria::all();

        foreach ($categorias as $categoria) {
            $imagensCategoria = $this->filtrarImagensPorCategoria($imagens, $categoria->nome);
            if (empty($imagensCategoria)) {
                $imagensCategoria = array_column($imagens, 'path');
            }

            shuffle($imagensCategoria);
            $imgCount = count($imagensCategoria);

            for ($i = 1; $i <= 30; $i++) {
                $imagem = $imagensCategoria[($i - 1) % $imgCount];
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
            return [
                ['path' => 'imagens/produtos/placeholder.png', 'name' => 'placeholder.png'],
            ];
        }

        return array_map(function ($path) {
            $filename = basename($path);
            return [
                'path' => 'imagens/produtos/' . $filename,
                'name' => Str::of($filename)->ascii()->lower()->toString(),
            ];
        }, $paths);
    }

    private function filtrarImagensPorCategoria(array $imagens, string $categoria): array
    {
        $categoriaKey = Str::of($categoria)->ascii()->lower()->toString();

        $map = [
            'feminino' => ['feminino', 'feminio', 'feminina', 'vestido', 'bolsa', 'jaqueta', 'saia', 'tenis_feminio', 'moletos'],
            'masculino' => ['masculino', 'masculina', 'camisapolo', 'polo', 'camisa', 'calca', 'jeans'],
            'acessorios' => ['acessorio', 'relogio', 'oculos'],
            'infantil' => ['infantil', 'brinquedo'],
            'brinquedos' => ['brinquedo'],
            'bolsas' => ['bolsa'],
            'esportivo' => ['esportiva', 'esporte', 'sport', 'tenis'],
            'vintage' => ['vintage', 'retro'],
        ];

        $patterns = $map[$categoriaKey] ?? [];
        if ($patterns === []) {
            return [];
        }

        $filtradas = [];
        foreach ($imagens as $img) {
            if ($categoriaKey === 'masculino') {
                if (str_contains($img['name'], 'feminino') || str_contains($img['name'], 'feminio')) {
                    continue;
                }
            }
            if ($categoriaKey === 'feminino') {
                if (str_contains($img['name'], 'masculino') || str_contains($img['name'], 'masculina')) {
                    continue;
                }
            }
            foreach ($patterns as $pattern) {
                if (str_contains($img['name'], $pattern)) {
                    $filtradas[] = $img['path'];
                    break;
                }
            }
        }

        return $filtradas;
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
