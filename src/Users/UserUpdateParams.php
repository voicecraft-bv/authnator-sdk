<?php

declare(strict_types=1);

namespace Authnator\Users;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Concerns\SdkParams;
use Authnator\Core\Contracts\BaseModel;
use Authnator\Users\UserUpdateParams\Value;

/**
 * Patch User Attribute.
 *
 * @see Authnator\Users->update
 *
 * @phpstan-type user_update_params = array{
 *   key: string,
 *   global?: bool,
 *   value?: string|float|bool|null|list<mixed>|array<string, mixed>,
 * }
 */
final class UserUpdateParams implements BaseModel
{
    /** @use SdkModel<user_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $key;

    #[Api(optional: true)]
    public ?bool $global;

    /** @var string|float|bool|list<mixed>|array<string, mixed>|null $value */
    #[Api(union: Value::class, nullable: true, optional: true)]
    public string|float|bool|array|null $value;

    /**
     * `new UserUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserUpdateParams::with(key: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserUpdateParams)->withKey(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $value
     */
    public static function with(
        string $key,
        ?bool $global = null,
        string|float|bool|array|null $value = null
    ): self {
        $obj = new self;

        $obj->key = $key;

        null !== $global && $obj->global = $global;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withKey(string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    public function withGlobal(bool $global): self
    {
        $obj = clone $this;
        $obj->global = $global;

        return $obj;
    }

    /**
     * @param string|float|bool|list<mixed>|array<string, mixed>|null $value
     */
    public function withValue(string|float|bool|array|null $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
