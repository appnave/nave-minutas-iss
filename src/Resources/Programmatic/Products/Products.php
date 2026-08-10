<?php

namespace Bildvitta\IssJuridico\Resources\Programmatic\Products;

use Bildvitta\IssJuridico\IssJuridico;

class Products
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function product_templates(): ProductTemplates
    {
        return new ProductTemplates($this->juridico);
    }
}