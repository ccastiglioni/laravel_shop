<?php

namespace App\Services\Catalogo;

use App\Models\Categoria;
use App\Models\Produto;

class CatalogoConsultaService
{
    public function listarNomesCategorias(): array
    {
        return Categoria::query()->pluck('nome')->filter()->values()->all();
    }

    public function contarProdutos(string $categoria = '', float $precoMax = 0): int
    {
        $query = Produto::query();
        $categoria = trim($categoria);

        if ($categoria !== '') {
            $categoriaEncontrada = $this->buscarCategoriaPorNome($categoria);

            if (! $categoriaEncontrada) {
                return 0;
            }

            $query->where('categoria_id', $categoriaEncontrada->id_catg);
        }

        if ($precoMax > 0) {
            $query->where('valor', '<=', $precoMax);
        }

        return $query->count();
    }

    public function buscarProdutoMaisBarato(string $categoria = ''): ?array
    {
        $query = Produto::query()->where('ativo', 'S');
        $categoria = trim($categoria);

        if ($categoria !== '') {
            $categoriaEncontrada = $this->buscarCategoriaPorNome($categoria);

            if (! $categoriaEncontrada) {
                return null;
            }

            $query->where('categoria_id', $categoriaEncontrada->id_catg);
        }

        $produto = $query->orderBy('valor')->orderBy('nome')->first();

        if (! $produto) {
            return null;
        }

        return [
            'id' => $produto->id_prod,
            'nome' => $produto->nome,
            'valor' => $produto->valor,
        ];
    }

    private function buscarCategoriaPorNome(string $categoria): ?Categoria
    {
        return Categoria::query()->where('nome', trim($categoria))->first();
    }
}
