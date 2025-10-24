<?php

namespace Authnator\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Rate Limit Exception';
}
