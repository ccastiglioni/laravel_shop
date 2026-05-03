<?php

namespace App\Services\Assistente;

use Prism\Prism\Text\Response as TextResponse;

class AssistenteResponseFormatter
{
    public function textoOuFallback(TextResponse $response): string
    {
        $texto = trim($response->text ?? '');

        if ($texto !== '') {
            return $texto;
        }

        return $this->montarRespostaDaTool($response) ?? '';
    }

    private function montarRespostaDaTool(TextResponse $response): ?string
    {
        foreach ($response->toolResults as $toolResult) {
            if ($toolResult->toolName === 'contar_produtos') {
                return $this->montarRespostaContagem($toolResult->result, $toolResult->args);
            }

            if ($toolResult->toolName === 'produto_mais_barato') {
                return $this->montarRespostaMaisBarato($toolResult->result, $toolResult->args);
            }
        }

        return null;
    }

    private function montarRespostaContagem(mixed $total, array $args): string
    {
        $categoria = trim((string) ($args['categoria'] ?? ''));
        $precoMax = $this->normalizarPrecoMaximo($args['preco_max'] ?? 0);

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

    private function montarRespostaMaisBarato(mixed $resultado, array $args): string
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

    private function normalizarPrecoMaximo(mixed $precoMax): float
    {
        return is_numeric($precoMax) ? (float) $precoMax : 0.0;
    }
}
