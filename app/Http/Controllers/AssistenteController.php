<?php

namespace App\Http\Controllers;

use App\Services\AssistenteService;
use Illuminate\Http\Request;
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
