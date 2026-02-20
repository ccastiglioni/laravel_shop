<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto_imagens;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produto_imagensSeeder extends Seeder
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
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $imagens = $this->listarImagensProdutos();
        $categorias = Categoria::with('categoria_hasmany_produtos')->get();

        foreach ($categorias as $categoria) {
            $imagensCategoria = $this->filtrarImagensPorCategoria($imagens, $categoria->nome);
            if (empty($imagensCategoria)) {
                $imagensCategoria = array_column($imagens, 'path');
            }

            if (empty($imagensCategoria)) {
                continue;
            }

            $imgCount = count($imagensCategoria);
            $imgIndex = 0;

            foreach ($categoria->categoria_hasmany_produtos as $produto) {
                $imagem = $imagensCategoria[$imgIndex % $imgCount];
                Produto_imagens::create([
                    'produto_id' => $produto->id_prod,
                    'nome_img' => $imagem,
                ]);
                $imgIndex++;
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
            'acessorios' => [
                'acessorio',
                'acessorios122',
                'acessorios123',
                'acessorios-35-00',
                'relogio',
                'oculos',
            ],
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

}
