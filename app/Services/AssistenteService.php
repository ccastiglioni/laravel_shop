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

        $promptSistema = $this->montarPromptSistema(); // instrucao para a IA
        $promptCategorias = $this->montarPromptCategorias(); // pega do db
        
        $promptFinal = trim($promptSistema."\n\n".$promptCategorias); // inc de prompts

        $useTools = $this->precisaFerramenta($mensagem);
        $useMaisBarato = $this->precisaFerramentaMaisBarato($mensagem);
        $tools = [];
        $toolChoice = null;
        //produto_mais_barato, contar_produtos = “uma função que eu disponibilizo pro modelo chamar”
        if ($useMaisBarato) {
            $tools[] = $this->criarToolProdutoMaisBarato();
            $toolChoice = 'produto_mais_barato';  //São identificadores (nomes) de ferramentas (“tools”)
        } elseif ($useTools) {
            $tools[] = $this->criarToolContarProdutos();
            $toolChoice = 'contar_produtos'; //São identificadores (nomes) de ferramentas (“tools”)
        }

        $requestPrism = Prism::text()
            ->using(Provider::Groq, $modelo)
            ->withSystemPrompt($promptFinal)
            ->withPrompt($mensagem)
            ->withClientOptions(['timeout' => $timeout]);

        if ($tools !== []) {
            $requestPrism = $requestPrism
                ->withTools($tools)
                ->withMaxSteps(2)
                ->withToolChoice($toolChoice);
        }

        $response = $requestPrism->asText();
       // die($response->message);;
        $texto = trim($response->text ?? '');
        if ($texto !== '') {
            return $texto;
        }

        $fallback = $this->montarRespostaDaTool($response);
        return $fallback ?? '';
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
            $categorias = Categoria::query()->pluck('nome')->filter()->values()->all();
        } catch (Throwable $e) {
            $categorias = [];
        }

        $lista = $categorias ? implode(', ', $categorias) : 'sem categorias cadastradas';

        return "Categorias disponíveis: {$lista}.";
    }

    private function precisaFerramenta(string $mensagem): bool
    {
        $m = mb_strtolower($mensagem);
        return (bool) preg_match('/quantos|quantas|quanto|preço|valor|menor que|menos que|maior que|acima de|abaixo de/', $m);
    }

    private function precisaFerramentaMaisBarato(string $mensagem): bool
    {
        $m = mb_strtolower($mensagem);
        return (bool) preg_match('/mais barato|menor preço|preço mais baixo|preco mais baixo/', $m);
    }
    /** 
     * Monta o “system prompt”, que é o conjunto de regras fixas que o modelo deve seguir em todas as respostas. 
     * */
    private function criarToolContarProdutos()
    {
        return Tool::as('contar_produtos')
            ->for('Conta produtos do e-commerce com filtros opcionais.')
            ->withStringParameter('categoria', 'Nome da categoria. Use string vazia se não houver.')
            ->withNumberParameter('preco_max', 'Preço máximo (número, sem aspas). Use 0 se não houver.')
            ->using(function (string $categoria, float $preco_max): string {
                $query = Produto::query();

                $categoria = trim($categoria);
                if ($categoria !== '') {
                    $cat = Categoria::query()->where('nome', $categoria)->first();
                    if ($cat) {
                        $query->where('categoria_id', $cat->id_catg);
                    }
                }

                if ($preco_max > 0) {
                    $query->where('valor', '<=', $preco_max);
                }

                return (string) $query->count();
            });
    }

    private function criarToolProdutoMaisBarato()
    {
        return Tool::as('produto_mais_barato')
            ->for('Retorna o produto mais barato, com filtro opcional por categoria.')
            ->withStringParameter('categoria', 'Nome da categoria. Use string vazia se não houver.')
            ->using(function (string $categoria): string {
                $query = Produto::query()->where('ativo', 'S');

                $categoria = trim($categoria);
                if ($categoria !== '') {
                    $cat = Categoria::query()->where('nome', $categoria)->first();
                    if ($cat) {
                        $query->where('categoria_id', $cat->id_catg);
                    }
                }

                $produto = $query->orderBy('valor')->orderBy('nome')->first();

                if (! $produto) {
                    return json_encode(['id' => null, 'nome' => null, 'valor' => null]);
                }

                return json_encode([
                    'id' => $produto->id_prod,
                    'nome' => $produto->nome,
                    'valor' => $produto->valor,
                ]);
            });
    }
    private function montarRespostaDaTool(TextResponse $response): ?string
    {
        foreach ($response->toolResults as $toolResult) {
            if ($toolResult->toolName !== 'contar_produtos') {
                if ($toolResult->toolName === 'produto_mais_barato') {
                    return $this->montarRespostaMaisBarato($toolResult->result, $toolResult->args);
                }
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

    private function montarRespostaMaisBarato(mixed $resultado, array $args): ?string
    {
        $dados = is_string($resultado) ? json_decode($resultado, true) : null;
        if (! is_array($dados) || empty($dados['nome'])) {
            return 'Não encontrei produtos para essa busca.';
        }

        $categoria = trim((string) ($args['categoria'] ?? ''));
        $preco = number_format((float) $dados['valor'], 2, ',', '.');

        if ($categoria !== '') {
            return "O produto mais barato em {$categoria} é {$dados['nome']} por R$ {$preco}.";
        }

        return "O produto mais barato da loja é {$dados['nome']} por R$ {$preco}.";
    }
}
