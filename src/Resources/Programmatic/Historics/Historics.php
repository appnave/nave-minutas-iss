<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\Historics;

use Bildvitta\IssJuridico\IssJuridico;

class Historics
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function store($data)
    {
        return $this->juridico->request->post(
            '/programmatic/historics/',
            $data
        )->object();
    }
}
