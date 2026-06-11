<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\ViewDocuments;

use Bildvitta\IssJuridico\IssJuridico;

class ViewDocuments
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function store(array $data): object
    {
        return $this->juridico->request->post(
            '/programmatic/view-documents/',
            $data
        )->object();
    }

    public function show(array $data): object
    {
        return $this->juridico->request->get(
            '/programmatic/view-documents/',
            $data
        )->object();
    }
}
