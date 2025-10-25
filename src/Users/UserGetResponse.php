<?php

declare(strict_types=1);

namespace Authnator\Users;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Concerns\SdkResponse;
use Authnator\Core\Contracts\BaseModel;
use Authnator\Core\Conversion\Contracts\ResponseConverter;
use Authnator\Users\UserGetResponse\Profile;

/**
 * @phpstan-type user_get_response = array{
 *   attributes: array<string, mixed>,
 *   email: string,
 *   profile: Profile,
 *   sub: string,
 *   createdAt?: \DateTimeInterface|null,
 * }
 */
final class UserGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<user_get_response> */
    use SdkModel;

    use SdkResponse;

    /** @var array<string, mixed> $attributes */
    #[Api(map: 'mixed')]
    public array $attributes;

    #[Api]
    public string $email;

    #[Api]
    public Profile $profile;

    #[Api]
    public string $sub;

    #[Api('created_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * `new UserGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserGetResponse::with(attributes: ..., email: ..., profile: ..., sub: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserGetResponse)
     *   ->withAttributes(...)
     *   ->withEmail(...)
     *   ->withProfile(...)
     *   ->withSub(...)
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
     * @param array<string, mixed> $attributes
     */
    public static function with(
        array $attributes,
        string $email,
        Profile $profile,
        string $sub,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $obj = new self;

        $obj->attributes = $attributes;
        $obj->email = $email;
        $obj->profile = $profile;
        $obj->sub = $sub;

        null !== $createdAt && $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param array<string, mixed> $attributes
     */
    public function withAttributes(array $attributes): self
    {
        $obj = clone $this;
        $obj->attributes = $attributes;

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

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }
}
