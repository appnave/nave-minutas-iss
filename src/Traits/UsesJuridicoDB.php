<?php

namespace Bildvitta\IssJuridico\Traits;

trait UsesJuridicoDB
{
    public function __construct(array $attributes = [])
    {
        $this->configDbConnection();
        parent::__construct($attributes);
    }

    public static function __callStatic($method, $parameters)
    {
        self::configDbConnection();

        return parent::__callStatic($method, $parameters);
    }

    protected static function configDbConnection(): void
    {
        config([
            'database.connections.iss-juridico' => [
                'driver' => 'mysql',
                'url' => config('iss-juridico.db.url'),
                'host' => config('iss-juridico.db.host'),
                'port' => config('iss-juridico.db.port'),
                'database' => config('iss-juridico.db.database'),
                'username' => config('iss-juridico.db.username'),
                'password' => config('iss-juridico.db.password'),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => [],
            ],
        ]);
    }
}
