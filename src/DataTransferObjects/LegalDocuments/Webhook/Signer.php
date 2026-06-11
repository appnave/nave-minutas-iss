<?php

namespace Bildvitta\IssJuridico\DataTransferObjects\LegalDocuments\Webhook;

class Signer
{
    /**
     * @var string|null
     */
    public ?string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var bool|null
     */
    public ?bool $signed;

    /**
     * @var string|null
     */
    public ?string $signed_at;

    /**
     * @var bool|null
     */
    public ?bool $internal_signer;

    /**
     * @var string|null
     */
    public ?string $type;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->email = $data['email'];
        $this->signed = $data['signed'] ?? null;
        $this->signed_at = $data['signed_at'] ?? null;
        $this->internal_signer = $data['internal_signer'] ?? null;
        $this->type = $data['type'] ?? null;
    }
}
