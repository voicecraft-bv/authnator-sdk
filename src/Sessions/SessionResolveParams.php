<?php

declare(strict_types=1);

namespace Authnator\Sessions;

use Authnator\Core\Attributes\Api;
use Authnator\Core\Concerns\SdkModel;
use Authnator\Core\Concerns\SdkParams;
use Authnator\Core\Contracts\BaseModel;

/**
 * Resolve Session.
 *
 * @see Authnator\Sessions->resolve
 *
 * @phpstan-type session_resolve_params = array{sessionToken: string}
 */
final class SessionResolveParams implements BaseModel
{
    /** @use SdkModel<session_resolve_params> */
    use SdkModel;
    use SdkParams;

    #[Api('session_token')]
    public string $sessionToken;

    /**
     * `new SessionResolveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionResolveParams::with(sessionToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionResolveParams)->withSessionToken(...)
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
    public static function with(string $sessionToken): self
    {
        $obj = new self;

        $obj->sessionToken = $sessionToken;

        return $obj;
    }

    public function withSessionToken(string $sessionToken): self
    {
        $obj = clone $this;
        $obj->sessionToken = $sessionToken;

        return $obj;
    }
}
