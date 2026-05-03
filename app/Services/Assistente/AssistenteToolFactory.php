<?php

namespace App\Services\Assistente;

use App\Services\Catalogo\CatalogoConsultaService;
use Prism\Prism\Facades\Tool;
use Prism\Prism\Tool as PrismTool;

class AssistenteToolFactory
{
    public function __construct(private readonly CatalogoConsultaService $catalogo) {}

    /**
     * @return array{tools: array<int, PrismTool>, tool_choice: ?string}
     */
    public function criarParaMensagem(string $mensagem): array
    {
        if ($this->precisaProdutoMaisBarato($mensagem)) {
            return [
                'tools' => [$this->criarToolProdutoMaisBarato()],
                'tool_choice' => 'produto_mais_barato',
            ];
        }

        if ($this->precisaContarProdutos($mensagem)) {
            return [
                'tools' => [$this->criarToolContarProdutos()],
                'tool_choice' => 'contar_produtos',
            ];
        }

        return [
            'tools' => [],
            'tool_choice' => null,
        ];
    }
    private function precisaProdutoMaisBarato(string $mensagem): bool
    {
        $mensagem = mb_strtolower($mensagem);

        return (bool) preg_match('/mais barato|menor preço|preço mais baixo|preco mais baixo/', $mensagem);
    }

    private function precisaContarProdutos(string $mensagem): bool
    {
        $mensagem = mb_strtolower($mensagem);

        return (bool) preg_match(
            '/quantos|quantas|quanto|preço|valor|menor que|menos que|maior que|acima de|abaixo de/',
            $mensagem
        );
    }

    private function criarToolContarProdutos(): PrismTool
    {
        return Tool::as('contar_produtos')
            ->for('Conta produtos do e-commerce com filtros opcionais.')
            ->withStringParameter('categoria', 'Nome da categoria. Use string vazia se não houver.')
            ->withNumberParameter('preco_max', 'Preço máximo (número, sem aspas). Use 0 se não houver.')
            ->using(fn(string $categoria, float $preco_max): string => (string) $this->catalogo->contarProdutos(
                categoria: $categoria,
                precoMax: $preco_max
            ));
    }

    private function criarToolProdutoMaisBarato(): PrismTool
    {
        return Tool::as('produto_mais_barato')
            ->for('Retorna o produto mais barato, com filtro opcional por categoria.')
            ->withStringParameter('categoria', 'Nome da categoria. Use string vazia se não houver.')
            ->using(fn(string $categoria): string => $this->codificarProduto(
                $this->catalogo->buscarProdutoMaisBarato($categoria) ?? $this->produtoNaoEncontrado()
            ));
    }

    private function produtoNaoEncontrado(): array
    {
        return ['id' => null, 'nome' => null, 'valor' => null];
    }

    private function codificarProduto(array $produto): string
    {
        $json = json_encode($produto);

        return is_string($json) ? $json : '{"id":null,"nome":null,"valor":null}';
    }
}
