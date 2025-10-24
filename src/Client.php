<?php

declare(strict_types=1);

namespace Authnator;

use Authnator\Core\BaseClient;
use Authnator\Services\MeService;
use Authnator\Services\SessionsService;
use Authnator\Services\UsersService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $bearerToken;

    /**
     * @api
     */
    public MeService $me;

    /**
     * @api
     */
    public SessionsService $sessions;

    /**
     * @api
     */
    public UsersService $users;

    public function __construct(?string $bearerToken = null, ?string $baseUrl = null)
    {
        $this->bearerToken = (string) ($bearerToken ?? getenv('AUTHNATOR_BEARER_TOKEN'));

        $baseUrl ??= getenv('AUTHNATOR_BASE_URL') ?: 'https://api.example.com';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->me = new MeService($this);
        $this->sessions = new SessionsService($this);
        $this->users = new UsersService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        if (!$this->bearerToken) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->bearerToken}"];
    }
}
