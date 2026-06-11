<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\ViewRequest;
use Illuminate\Http\JsonResponse;

class FileController extends DocumentController
{
    public function __invoke(ViewRequest $request): JsonResponse
    {
        $response = app('juridico')->documents()->file($request);

        return response()->json(
            $response,
            $response->status->code
        );
    }
}
