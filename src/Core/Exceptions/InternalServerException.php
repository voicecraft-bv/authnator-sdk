<?php

namespace Authnator\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Internal Server Exception';
}
