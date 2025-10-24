<?php

namespace Authnator\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Conflict Exception';
}
