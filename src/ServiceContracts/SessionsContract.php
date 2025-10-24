<?php

declare(strict_types=1);

namespace Authnator\ServiceContracts;

use Authnator\Core\Exceptions\APIException;
use Authnator\RequestOptions;

interface SessionsContract
{
    /**
     * @api
     *
     * @param string $sessionToken
     *
     * @throws APIException
     */
    public function resolve(
        $sessionToken,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $sub
     *
     * @throws APIException
     */
    public function revoke(
        $sub,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;
}
