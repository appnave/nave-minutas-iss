<?php

namespace Bildvitta\IssJuridico\Resources;

use Bildvitta\IssJuridico\IssJuridico;

class Templates
{
    private IssJuridico $juridico;

    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function documentType($data)
    {
        return $this->juridico->request->get(
            "/templates/document-type/{$data}"
        )->object();
    }
}
