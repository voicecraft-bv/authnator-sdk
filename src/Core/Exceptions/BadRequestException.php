<?php

namespace Authnator\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Bad Request Exception';
}
