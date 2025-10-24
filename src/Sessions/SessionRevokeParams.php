<?php

declare(strict_types=1);

namespace Authnator\Sessions;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Concerns\SdkParams;
use Authnator\Core\Contracts\BaseModel;

/**
 * Revoke Sessions.
 *
 * @see Authnator\Sessions->revoke
 *
 * @phpstan-type session_revoke_params = array{sub: string}
 */
final class SessionRevokeParams implements BaseModel
{
    /** @use SdkModel<session_revoke_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $sub;

    /**
     * `new SessionRevokeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionRevokeParams::with(sub: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionRevokeParams)->withSub(...)
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
    public static function with(string $sub): self
    {
        $obj = new self;

        $obj->sub = $sub;

        return $obj;
    }

    public function withSub(string $sub): self
    {
        $obj = clone $this;
        $obj->sub = $sub;

        return $obj;
    }
}
