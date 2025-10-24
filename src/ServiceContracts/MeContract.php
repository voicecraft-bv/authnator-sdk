<?php

declare(strict_types=1);

namespace Authnator\ServiceContracts;

use Authnator\Core\Exceptions\APIException;
use Authnator\Me\MeGetResponse;
use Authnator\RequestOptions;

interface MeContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): MeGetResponse;
}
