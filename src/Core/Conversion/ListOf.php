<?php

declare(strict_types=1);

namespace Authnator\Core\Conversion;

use Authnator\Core\Conversion\Concerns\ArrayOf;
use Authnator\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
