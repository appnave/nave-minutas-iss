<?php

namespace Bildvitta\IssJuridico\Http\Requests\Documents;

use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'uuid_legal'                => ['required'],
            'external_id'               => ['required'],
            'action'                    => ['nullable'],
            'document_type_slug'        => ['nullable'],
            'is_legal_validation'       => ['nullable', 'boolean'],
            'type'                      => ['required'],
            'message'                   => ['nullable'],
            'signers'                   => ['nullable', 'array'],
            'signers.*.name'            => ['nullable'],
            'signers.*.email'           => ['required'],
            'signers.*.signed'          => ['nullable', 'boolean'],
            'signers.*.signed_at'       => ['nullable'],
            'signers.*.internal_signer' => ['nullable', 'boolean'],
            'signers.*.type'            => ['nullable'],
        ];
    }
}
