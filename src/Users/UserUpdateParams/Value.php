<?php

declare(strict_types=1);

namespace Authnator\Users\UserUpdateParams;

use Authnator\Core\Concerns\SdkUnion;
use Authnator\Core\Conversion\Contracts\Converter;
use Authnator\Core\Conversion\Contracts\ConverterSource;
use Authnator\Core\Conversion\ListOf;
use Authnator\Core\Conversion\MapOf;

final class Value implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return ['string', 'float', 'bool', new MapOf('mixed'), new ListOf('mixed')];
    }
}
