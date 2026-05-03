<?php

namespace App\Services\Assistente;

use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;

class AssistenteService
{
    public function __construct(
        private readonly AssistentePromptBuilder $promptBuilder,
        private readonly AssistenteToolFactory $toolFactory,
        private readonly AssistenteResponseFormatter $responseFormatter
    ) {}

    public function responder(string $mensagem): string
    {
        $modelo = config('services.groq.model', env('GROQ_MODEL', 'llama3-70b-8192'));
        $timeout = (int) env('PRISM_REQUEST_TIMEOUT', 60);
        //Cria produto_mais_barato OU contar_produtos, dependendo da busca(string) : quantas, mais barato..ETC
        $toolConfig = $this->toolFactory->criarParaMensagem($mensagem);

        $requestPrism = Prism::text()
            ->using(Provider::Groq, $modelo)
            ->withSystemPrompt($this->promptBuilder->montar())  //listarNomesCategorias
            ->withPrompt($mensagem)
            ->withClientOptions(['timeout' => $timeout]);

        if ($toolConfig['tools'] !== []) {
            $requestPrism = $requestPrism
                ->withTools($toolConfig['tools'])
                ->withMaxSteps(2)
                ->withToolChoice($toolConfig['tool_choice']);
        }

        return $this->responseFormatter->textoOuFallback($requestPrism->asText());
    }
}
