<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\ChangeSignerRequest;
use Illuminate\Http\JsonResponse;

class ChangeSignerController extends DocumentController
{
    public function __invoke(ChangeSignerRequest $request, $document, $signerDocument): JsonResponse
    {
        $response = app('juridico')->documents()->changeSigner($document, $signerDocument, $request);

        return response()->json(
            $response,
            $response->status->code
        );

    }
}
