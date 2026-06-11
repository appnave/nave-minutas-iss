<?php

namespace Bildvitta\IssJuridico\Events\LegalDocuments;

use Bildvitta\IssJuridico\DataTransferObjects\LegalDocuments\Webhook\Webhook;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebhookReceived
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * @param Webhook $data
     */
    public function __construct(public Webhook $data)
    {
    }
}
