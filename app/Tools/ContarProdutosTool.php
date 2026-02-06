<?php

namespace App\Tools;

use App\Models\Categoria;
use App\Models\Produto;
use Prism\Prism\Tool;

class ContarProdutosTool extends Tool
{
    public function __construct()
    {
        $this
            ->as('contar_produtos')
            ->for('Conta produtos por preço máximo e categoria (opcional). Use quando a pergunta pedir números reais.')
            ->withNumberParameter('preco_max', 'Preço máximo em reais. Ex.: 120 (opcional).', false)
            ->withStringParameter('categoria', 'Nome da categoria (opcional). Ex.: Masculino', false)
            ->using($this);
    }

    public function __invoke(?float $preco_max = null, ?string $categoria = null): string
    {
        $query = Produto::query();
        if ($preco_max !== null) {
            $query->where('valor', '<=', $preco_max);
        }

        if ($categoria) {
            $categoria = trim($categoria);
            if ($categoria !== '') {
                $cat = Categoria::query()->where('nome', $categoria)->first();
                if (! $cat) {
                    return "Categoria não encontrada: {$categoria}.";
                }
                $query->where('categoria_id', $cat->id_catg);
            }
        }

        $total = $query->count();

        $catLabel = $categoria ? $categoria : 'todas';
        if ($preco_max !== null) {
            $preco = number_format($preco_max, 2, ',', '.');
            return "Total de produtos com valor até R$ {$preco} (categoria: {$catLabel}): {$total}.";
        }

        return "Total de produtos (categoria: {$catLabel}): {$total}.";
    }
}
