<?php

namespace Bildvitta\IssJuridico\Resources;

use Bildvitta\IssJuridico\IssJuridico;
use Illuminate\Http\Client\RequestException;

class Templates
{
    private IssJuridico $juridico;

    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    /**
     * @throws RequestException
     */
    public function documentType($data, int $limit = 48, int $offset = 0, string $search = '')
    {
        $search = urlencode($search);

        $url = "/templates/document-type/{$data}?limit={$limit}&offset={$offset}&search={$search}";

        return $this->juridico->request->get($url)->throw()->object();
    }
}
