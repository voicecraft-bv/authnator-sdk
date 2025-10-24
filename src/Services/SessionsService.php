<?php

declare(strict_types=1);

namespace Authnator\Services;

use Authnator\Client;
use Authnator\Core\Exceptions\APIException;
use Authnator\RequestOptions;
use Authnator\ServiceContracts\SessionsContract;
use Authnator\Sessions\SessionResolveParams;
use Authnator\Sessions\SessionRevokeParams;

final class SessionsService implements SessionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Resolve Session
     *
     * @param string $sessionToken
     *
     * @throws APIException
     */
    public function resolve(
        $sessionToken,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['sessionToken' => $sessionToken];

        return $this->resolveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function resolveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SessionResolveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v1/sessions/resolve',
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Revoke Sessions
     *
     * @param string $sub
     *
     * @throws APIException
     */
    public function revoke($sub, ?RequestOptions $requestOptions = null): mixed
    {
        $params = ['sub' => $sub];

        return $this->revokeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function revokeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SessionRevokeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v1/sessions/revoke',
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
