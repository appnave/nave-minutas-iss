<?php

namespace Bildvitta\IssJuridico;

use Bildvitta\IssJuridico\Contracts\IssJuridicoFactory;
use Bildvitta\IssJuridico\Resources\Documents;
use Bildvitta\IssJuridico\Resources\Programmatic\Programmatic;
use Bildvitta\IssJuridico\Resources\Templates;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class IssJuridico extends HttpClient implements IssJuridicoFactory
{
    public PendingRequest $request;

    private ?string $token;

    public function __construct(?string $token = '')
    {
        parent::__construct();
        if (is_null($token)) {
            $token = '';
        }

        $programmatic = true;
        if ($token != '') {
            $programmatic = false;
        }

        $this->setToken($token, $programmatic);
    }

    public function setToken(string $token, bool $programmatic = false)
    {
        $this->token = $token;

        if ($programmatic) {
            $clientId = Config::get('hub.programatic_access.client_id');
            $accessToken = $this->getToken();
            $this->token = $accessToken;
        }

        $this->prepareRequest();

        return $this;
    }

    private function getToken()
    {
        $hubUrl = Config::get('hub.base_uri') . Config::get('hub.oauth.token_uri');
        $clientId = Config::get('hub.programatic_access.client_id');
        $secretId = Config::get('hub.programatic_access.client_secret');
        $response = Http::asForm()->post($hubUrl, [
            'grant_type'    => 'client_credentials',
            'client_id'     => $clientId,
            'client_secret' => $secretId,
            'scope'         => '*',
        ]);

        return $response->json('access_token');
    }

    private function prepareRequest(): PendingRequest
    {
        return $this->request = Http::withToken($this->token)
            ->baseUrl(Config::get('iss-juridico.base_uri').Config::get('iss-juridico.prefix'))
            ->withOptions(self::DEFAULT_OPTIONS)
            ->withHeaders($this->getHeaders());
    }

    public function getHeaders()
    {
        return array_merge(
            self::DEFAULT_HEADERS,
            [
                'Almobi-Host' => Config::get('app.slug', ''),
            ]
        );
    }

    public function documents(): Documents
    {
        return new Documents($this);
    }

    public function programmatic(): Programmatic
    {
        return new Programmatic($this);
    }

    public function templates(): Templates
    {
        return new Templates($this);
    }
}
