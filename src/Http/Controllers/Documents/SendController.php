<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\SendRequest;
use Illuminate\Http\JsonResponse;

class SendController extends DocumentController
{
    public function __invoke(SendRequest $request): JsonResponse
    {
        $response = app('juridico')->documents()->send($request);

        return response()->json(
            $response,
            $response->status->code
        );
    }
}
