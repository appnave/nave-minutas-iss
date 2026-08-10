<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\Products;

use Bildvitta\IssJuridico\IssJuridico;

class ProductTemplates
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function index(string $realEstateDevelopmentUuid, array $data = []): object
    {
        return $this->juridico->request->get(
            sprintf('/programmatic/products/%s/product-templates', $realEstateDevelopmentUuid),
            $data
        )->object();
    }
}
