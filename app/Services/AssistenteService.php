<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Produto;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Enums\ToolChoice;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Facades\Tool;
use Prism\Prism\Text\Response as TextResponse;
use Throwable;

class AssistenteService
{
    public function responder(string $mensagem): string
    {
        $modelo = config('services.groq.model', env('GROQ_MODEL', 'llama3-70b-8192'));
        $timeout = (int) env('PRISM_REQUEST_TIMEOUT', 60);

        $categorias = $this->listarCategorias();
        $promptSistema = $this->montarPromptSistema($categorias);
        $useTools = $this->precisaFerramenta($mensagem);
        $tool = $useTools ? $this->criarToolContarProdutos() : null;

        $request = Prism::text()
            ->using(Provider::Groq, $modelo)
            ->withSystemPrompt($promptSistema)
            ->withPrompt($mensagem)
            ->withClientOptions(['timeout' => $timeout]);

        if ($useTools && $tool) {
            $request = $request
                ->withTools([$tool])
                ->withMaxSteps(2)
                ->withToolChoice('contar_produtos');
        }

        $response = $request->asText();

        $texto = trim($response->text ?? '');
        if ($texto !== '') {
            return $texto;
        }

        $fallback = $this->montarRespostaDaTool($response);
        return $fallback ?? '';
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

Quando a pergunta pedir números reais (ex.: quantos produtos, preços, totais),
use a ferramenta "contar_produtos" para consultar o banco e nunca invente números.
Ao chamar a ferramenta, sempre envie:
- categoria: string (vazia se não houver)
- preco_max: number (0 se não houver)
IMPORTANTE: "preco_max" deve ser número (sem aspas). Exemplo:
{"categoria":"Masculino","preco_max":0}

Se a pergunta não for sobre a loja, responda educadamente que só ajuda
com dúvidas do e-commerce.
PROMPT;
    }

    private function precisaFerramenta(string $mensagem): bool
    {
        $m = mb_strtolower($mensagem);
        return (bool) preg_match('/quantos|quantas|quanto|preço|valor|menor que|menos que|maior que|acima de|abaixo de/', $m);
    }

    private function criarToolContarProdutos()
    {
        return Tool::as('contar_produtos')
            ->for('Conta produtos do e-commerce com filtros opcionais.')
            ->withStringParameter('categoria', 'Nome da categoria. Use string vazia se não houver.')
            ->withNumberParameter('preco_max', 'Preço máximo (número, sem aspas). Use 0 se não houver.')
            ->using(function (string $categoria, float $precoMax): string {
                $query = Produto::query();

                $categoria = trim($categoria);
                if ($categoria !== '') {
                    $cat = Categoria::query()->where('nome', $categoria)->first();
                    if ($cat) {
                        $query->where('categoria_id', $cat->id_catg);
                    }
                }

                if ($precoMax > 0) {
                    $query->where('valor', '<=', $precoMax);
                }

                return (string) $query->count();
            });
    }

    private function montarRespostaDaTool(TextResponse $response): ?string
    {
        foreach ($response->toolResults as $toolResult) {
            if ($toolResult->toolName !== 'contar_produtos') {
                continue;
            }

            $total = $toolResult->result;
            $args = $toolResult->args;
            $categoria = trim((string) ($args['categoria'] ?? ''));
            $precoMax = $args['preco_max'] ?? 0;
            $precoMax = is_numeric($precoMax) ? (float) $precoMax : 0.0;

            if ($categoria !== '' && $precoMax > 0) {
                $preco = number_format($precoMax, 2, ',', '.');
                return "Temos {$total} produtos na categoria {$categoria} com preço até R$ {$preco}.";
            }

            if ($categoria !== '') {
                return "Temos {$total} produtos na categoria {$categoria}.";
            }

            if ($precoMax > 0) {
                $preco = number_format($precoMax, 2, ',', '.');
                return "Temos {$total} produtos com preço até R$ {$preco}.";
            }

            return "Temos {$total} produtos no total.";
        }

        return null;
    }
}
