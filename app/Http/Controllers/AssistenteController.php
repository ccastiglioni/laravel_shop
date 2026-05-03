<?php

namespace App\Http\Controllers;

use App\Services\Assistente\AssistenteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class AssistenteController extends Controller
{
    public function __construct(private readonly AssistenteService $assistente) {}

    public function chat(Request $request)
    {
        $data = $request->validate([
            'message' => ['required', 'string', 'min:2', 'max:500'],
        ]);

        try {
            $answer = $this->assistente->responder($data['message']);
        } catch (Throwable $e) {
            Log::error('Assistente error', [
                'message' => $e->getMessage(),
                'type' => get_class($e),
            ]);
            return response()->json([
                'ok' => false,
                'error' => 'Falha ao consultar o assistente agora.',
            ], 502);
        }

        return response()->json([
            'ok' => true,
            'answer' => $answer,
        ]);
    }
}
