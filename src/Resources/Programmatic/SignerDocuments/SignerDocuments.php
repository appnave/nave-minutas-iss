<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\SignerDocuments;

use Bildvitta\IssJuridico\IssJuridico;

class SignerDocuments
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function store($data)
    {
        return $this->juridico->request->post(
            '/programmatic/signer-documents/',
            $data
        )->object();
    }

    public function put($uuidSignerDocument, $data)
    {
        return $this->juridico->request->put(
            sprintf('/programmatic/signer-documents/%s', $uuidSignerDocument),
            $data
        )->object();
    }
}
