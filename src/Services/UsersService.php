<?php

declare(strict_types=1);

namespace Authnator\Services;

use Authnator\Client;
use Authnator\Core\Exceptions\APIException;
use Authnator\RequestOptions;
use Authnator\ServiceContracts\UsersContract;
use Authnator\Users\UserGetResponse;
use Authnator\Users\UserUpdateParams;

use const Authnator\Core\OMIT as omit;

final class UsersService implements UsersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Server User
     *
     * @throws APIException
     */
    public function retrieve(
        string $sub,
        ?RequestOptions $requestOptions = null
    ): UserGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['v1/users/%1$s', $sub],
            options: $requestOptions,
            convert: UserGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Patch User Attribute
     *
     * @param string $key
     * @param bool $global
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $value
     *
     * @throws APIException
     */
    public function update(
        string $sub,
        $key,
        $global = omit,
        $value = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['key' => $key, 'global' => $global, 'value' => $value];

        return $this->updateRaw($sub, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $sub,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['v1/users/%1$s', $sub],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
