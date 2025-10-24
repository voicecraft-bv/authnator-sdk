<?php

declare(strict_types=1);

namespace Authnator\Core\Conversion;

use Authnator\Core\Conversion\Concerns\ArrayOf;
use Authnator\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
