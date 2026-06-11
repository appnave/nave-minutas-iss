# Nave Minutas ISS

Pacote privado `appnave/nave-minutas-iss` para integração com o serviço jurídico/ISS em projetos Laravel. O consumo é feito via Composer com repositório VCS no projeto cliente.

## Requisitos

- PHP 8.1 ou superior
- Composer 2
- Laravel compatível com `illuminate/contracts` `^8|^9|^10|^11|^12`
- Acesso ao repositório privado no GitHub

## Acesso a repositórios privados

No projeto cliente, adicione o repositório VCS em `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/appnave/nave-minutas-iss"
    }
  ]
}
```

Depois, instale o pacote:

```bash
composer require appnave/nave-minutas-iss
```

Para autenticar o Composer localmente com token do GitHub:

```bash
composer config -g github-oauth.github.com <YOUR_TOKEN>
```

No GitHub Actions, configure `COMPOSER_AUTH`:

```yaml
env:
  COMPOSER_AUTH: >-
    {"github-oauth":{"github.com":"${{ secrets.GITHUB_TOKEN }}"}}
```

## Instalação local

1. Adicione o repositório VCS no `composer.json` do projeto cliente.
2. Execute `composer require appnave/nave-minutas-iss`.
3. Publique a configuração do pacote:

```bash
php artisan vendor:publish --provider="Bildvitta\IssJuridico\IssJuridicoServiceProvider" --tag="iss-juridico-config"
```

4. Configure as variáveis de ambiente usadas pelo pacote:

```env
MS_JURIDICO_BASE_URI=https://contratos-server.nave.dev.br
MS_JURIDICO_API_PREFIX=api
```

5. Se for usar as models do pacote, configure também a conexão do banco:

```env
MS_JURIDICO_DB_URL=
MS_JURIDICO_DB_HOST=
MS_JURIDICO_DB_PORT=
MS_JURIDICO_DB_DATABASE=
MS_JURIDICO_DB_USERNAME=
MS_JURIDICO_DB_PASSWORD=
```

Uso básico com facade:

```php
use Bildvitta\IssJuridico\Facades\IssJuridico;

$documents = IssJuridico::documents()->list([]);
```

## Comandos úteis

```bash
php artisan vendor:publish --provider="Bildvitta\IssJuridico\IssJuridicoServiceProvider" --tag="iss-juridico-config"
composer check-style
composer fix-style
vendor/bin/pest
```

## Informações adicionais

- O pacote publica `config/iss-juridico.php`.
- As models usam a conexão `iss-juridico`, então as variáveis `MS_JURIDICO_DB_*` precisam estar corretas quando essa camada for utilizada.
- As rotas do pacote dependem dos middlewares `hub.auth` e `hub.programmatic` no projeto cliente.
- O header `Almobi-Host` usa `app.slug`.
