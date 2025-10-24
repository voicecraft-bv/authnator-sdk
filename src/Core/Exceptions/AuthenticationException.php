<?php

namespace Authnator\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Authnator Authentication Exception';
}
