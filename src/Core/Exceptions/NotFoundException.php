<?php

namespace Authnator\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Not Found Exception';
}
