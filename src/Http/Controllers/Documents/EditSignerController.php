<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\EditSignerRequest;
use Illuminate\Http\JsonResponse;

class EditSignerController extends DocumentController
{
    public function __invoke(EditSignerRequest $request, $document, $signerDocument): JsonResponse
    {
        $response = app('juridico')->documents()->editSigner($document, $signerDocument);

        return response()->json(
            $response,
            $response->status->code
        );

    }
}
