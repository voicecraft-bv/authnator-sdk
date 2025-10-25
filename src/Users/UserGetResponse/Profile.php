<?php

declare(strict_types=1);

namespace Authnator\Users\UserGetResponse;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Contracts\BaseModel;

/**
 * @phpstan-type profile_alias = array{
 *   avatar: string, name: string, surname: string
 * }
 */
final class Profile implements BaseModel
{
    /** @use SdkModel<profile_alias> */
    use SdkModel;

    #[Api]
    public string $avatar;

    #[Api]
    public string $name;

    #[Api]
    public string $surname;

    /**
     * `new Profile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Profile::with(avatar: ..., name: ..., surname: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Profile)->withAvatar(...)->withName(...)->withSurname(...)
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
     */
    public static function with(
        string $avatar,
        string $name,
        string $surname
    ): self {
        $obj = new self;

        $obj->avatar = $avatar;
        $obj->name = $name;
        $obj->surname = $surname;

        return $obj;
    }

    public function withAvatar(string $avatar): self
    {
        $obj = clone $this;
        $obj->avatar = $avatar;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSurname(string $surname): self
    {
        $obj = clone $this;
        $obj->surname = $surname;

        return $obj;
    }
}
