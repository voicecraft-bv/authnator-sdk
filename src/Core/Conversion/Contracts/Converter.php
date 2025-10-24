<?php

declare(strict_types=1);

namespace Authnator\Core\Conversion\Contracts;

use Authnator\Core\Conversion\CoerceState;
use Authnator\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
