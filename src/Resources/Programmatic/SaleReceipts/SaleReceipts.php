<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\SaleReceipts;

use Bildvitta\IssJuridico\IssJuridico;
use Illuminate\Http\Client\Response;

class SaleReceipts
{
    private IssJuridico $juridico;

    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function store(array $data): Response
    {
        return $this->juridico->request->post(
            '/programmatic/sale-receipts/',
            $data
        );
    }
}
