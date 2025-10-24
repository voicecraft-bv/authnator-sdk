<?php

declare(strict_types=1);

namespace Authnator\Me;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Concerns\SdkResponse;
use Authnator\Core\Contracts\BaseModel;
use Authnator\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type me_get_response = array{
 *   email: string,
 *   profile: Profile,
 *   sub: string,
 *   attributes?: array<string, mixed>|null,
 * }
 */
final class MeGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<me_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $email;

    #[Api]
    public Profile $profile;

    #[Api]
    public string $sub;

    /** @var array<string, mixed>|null $attributes */
    #[Api(map: 'mixed', nullable: true, optional: true)]
    public ?array $attributes;

    /**
     * `new MeGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeGetResponse::with(email: ..., profile: ..., sub: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeGetResponse)->withEmail(...)->withProfile(...)->withSub(...)
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
     * @param array<string, mixed>|null $attributes
     */
    public static function with(
        string $email,
        Profile $profile,
        string $sub,
        ?array $attributes = null
    ): self {
        $obj = new self;

        $obj->email = $email;
        $obj->profile = $profile;
        $obj->sub = $sub;

        null !== $attributes && $obj->attributes = $attributes;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withProfile(Profile $profile): self
    {
        $obj = clone $this;
        $obj->profile = $profile;

        return $obj;
    }

    public function withSub(string $sub): self
    {
        $obj = clone $this;
        $obj->sub = $sub;

        return $obj;
    }

    /**
     * @param array<string, mixed>|null $attributes
     */
    public function withAttributes(?array $attributes): self
    {
        $obj = clone $this;
        $obj->attributes = $attributes;

        return $obj;
    }
}
