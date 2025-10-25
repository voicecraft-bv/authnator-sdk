<?php

declare(strict_types=1);

namespace Authnator;

use Authnator\Core\BaseClient;
use Authnator\Services\SessionsService;
use Authnator\Services\UsersService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public SessionsService $sessions;

    /**
     * @api
     */
    public UsersService $users;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('AUTHNATOR_API_KEY'));

        $baseUrl ??= getenv('AUTHNATOR_BASE_URL') ?: 'https://api.authnator.com';

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

        $this->sessions = new SessionsService($this);
        $this->users = new UsersService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['X-API-Key' => $this->apiKey];
    }
}
