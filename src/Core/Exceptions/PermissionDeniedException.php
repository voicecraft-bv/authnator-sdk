<?php

namespace Authnator\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Permission Denied Exception';
}
