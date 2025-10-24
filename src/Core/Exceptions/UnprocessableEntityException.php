<?php

namespace Authnator\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Unprocessable Entity Exception';
}
