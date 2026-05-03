<?php

namespace App\Services\Assistente;

use App\Services\Catalogo\CatalogoConsultaService;
use Throwable;

class AssistentePromptBuilder
{
    public function __construct(private readonly CatalogoConsultaService $catalogo) {}

    public function montar(): string
    {
        return trim($this->montarPromptSistema()."\n\n".$this->montarPromptCategorias());
    }

    private function montarPromptSistema(): string
    {
        return <<<PROMPT
Você é o assistente do e-commerce. Responda de forma curta e útil.
Seu objetivo é ajudar o cliente a navegar no site, entender categorias,
promoções, frete, troca e como usar o carrinho.

Quando a pergunta pedir números reais (ex.: quantos produtos, preços, totais),
use a ferramenta "contar_produtos" para consultar o banco e nunca invente números.
Ao chamar a ferramenta, sempre envie:
- categoria: string (vazia se não houver)
- preco_max: number (0 se não houver)
IMPORTANTE: "preco_max" deve ser número (sem aspas). Exemplo:
{"categoria":"Masculino","preco_max":0}

Quando a pergunta for sobre o produto mais barato, use a ferramenta
"produto_mais_barato". Se não houver categoria, envie categoria vazia.

Se a pergunta não for sobre a loja, responda educadamente que só ajuda
com dúvidas do e-commerce.
PROMPT;
    }

    private function montarPromptCategorias(): string
    {
        try {
            $categorias = $this->catalogo->listarNomesCategorias();
        } catch (Throwable $e) {
            $categorias = [];
        }

        $lista = $categorias ? implode(', ', $categorias) : 'sem categorias cadastradas';

        return "Categorias disponíveis: {$lista}.";
    }
}
