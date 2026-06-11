<?php

namespace Bildvitta\IssJuridico\Contracts;

interface IssJuridicoFactory
{
    public const DEFAULT_HEADERS = [
        'content-type' => 'application/json',
        'accept'       => 'application/json',
        'User-Agent'   => 'iss-juridico v0.0.1-alpha',
    ];

    public const DEFAULT_OPTIONS = ['allow_redirects' => false];
}
