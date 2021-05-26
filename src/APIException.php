<?php

namespace GrpcClient\Sample;

use RuntimeException;
use Throwable;

class APIException extends RuntimeException
{
    public function __construct($status, Throwable $previous = null)
    {
        parent::__construct('gRPC error: ' . $status->details, $status->code, $previous);
    }

}