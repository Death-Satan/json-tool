<?php

declare(strict_types=1);
/**
 * This is an extension of Death-Satan
 * Name PHP-Excel
 *
 * @link     https://www.cnblogs.com/death-satan
 */
namespace DeathSatan\JsonTool\Exception;

class JsonPackException extends \Exception
{
    public function __construct($message = null, $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message === null ? json_last_error() : $message, $code, $previous);
    }
}
