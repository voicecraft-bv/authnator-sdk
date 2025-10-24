<?php

declare(strict_types=1);

namespace Authnator\ServiceContracts;

use Authnator\Core\Exceptions\APIException;
use Authnator\RequestOptions;
use Authnator\Users\UserGetResponse;

use const Authnator\Core\OMIT as omit;

interface UsersContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $sub,
        ?RequestOptions $requestOptions = null
    ): UserGetResponse;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
