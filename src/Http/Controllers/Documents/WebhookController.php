<?php

namespace Bildvitta\IssJuridico\Http\Controllers\Documents;

use Bildvitta\IssJuridico\DataTransferObjects\LegalDocuments\Webhook\Webhook;
use Bildvitta\IssJuridico\Events\LegalDocuments\WebhookReceived;
use Bildvitta\IssJuridico\Http\Requests\Documents\WebhookRequest;
use Illuminate\Http\JsonResponse;

class WebhookController extends DocumentController
{
    /**
     * @param WebhookRequest $request
     * @return JsonResponse
     */
    public function __invoke(WebhookRequest $request): JsonResponse
    {
        $webhook = new Webhook($request->validated());
        event(new WebhookReceived($webhook));

        return response()->json([
            'status' => [
                'code'    => 200,
                'message' => __('Webhook received.'),
            ],
        ]);
    }
}
