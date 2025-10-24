<?php

declare(strict_types=1);

namespace Authnator\Services;

use Authnator\Client;
use Authnator\Core\Exceptions\APIException;
use Authnator\Me\MeGetResponse;
use Authnator\RequestOptions;
use Authnator\ServiceContracts\MeContract;

final class MeService implements MeContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Me
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): MeGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'v1/me',
            options: $requestOptions,
            convert: MeGetResponse::class,
        );
    }
}
