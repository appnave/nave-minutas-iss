<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\HistoricRequest;
use Illuminate\Http\JsonResponse;

class SelectController extends DocumentController
{
    public function __invoke(HistoricRequest $request): JsonResponse
    {
        $response = app('juridico')->documents()->select($request);

        return response()->json(
            $response,
            $response->status->code
        );
    }
}
