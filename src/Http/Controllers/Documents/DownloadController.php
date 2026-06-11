<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\Http\Requests\Documents\DownloadRequest;
use Illuminate\Http\JsonResponse;

class DownloadController extends DocumentController
{
    public function __invoke(DownloadRequest $request, $document): JsonResponse
    {
        $response = app('juridico')->documents()->download($document);

        return response()->json(
            $response,
            $response->status->code
        );
    }
}
