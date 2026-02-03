<?php

namespace App\Services;

use App\Models\Categoria;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;
use Throwable;

class AssistenteService
{
    public function responder(string $mensagem): string
    {
        $modelo = config('services.ollama.model', env('OLLAMA_MODEL', 'mistral'));
        $timeout = (int) env('PRISM_REQUEST_TIMEOUT', 60);

        $categorias = $this->listarCategorias();
        $promptSistema = $this->montarPromptSistema($categorias);

        $response = Prism::text()
            ->using(Provider::Ollama, $modelo)
            ->withSystemPrompt($promptSistema)
            ->withPrompt($mensagem)
            ->withClientOptions(['timeout' => $timeout])
            ->asText();

        return trim($response->text ?? '');
    }

    private function listarCategorias(): array
    {
        try {
            return Categoria::query()->pluck('nome')->filter()->values()->all();
        } catch (Throwable $e) {
            return [];
        }
    }

    private function montarPromptSistema(array $categorias): string
    {
        $lista = $categorias ? implode(', ', $categorias) : 'sem categorias cadastradas';

        return <<<PROMPT
Você é o assistente do e-commerce. Responda de forma curta e útil.
Seu objetivo é ajudar o cliente a navegar no site, entender categorias,
promoções, frete, troca e como usar o carrinho.

Categorias disponíveis: {$lista}.

Se a pergunta não for sobre a loja, responda educadamente que só ajuda
com dúvidas do e-commerce.
PROMPT;
    }
}
