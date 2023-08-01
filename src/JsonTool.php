<?php

declare(strict_types=1);
/**
 * This is an extension of Death-Satan
 * Name PHP-Excel
 *
 * @link     https://www.cnblogs.com/death-satan
 */
namespace DeathSatan\JsonTool;

use DeathSatan\JsonTool\Exception\JsonPackException;

class JsonTool
{
    public function isJson(string $json): bool
    {
        json_decode($json);
        return json_last_error() !== JSON_ERROR_NONE;
    }

    /**
     * @return mixed
     * @throws JsonPackException
     */
    public function stringToObject(string $json, int $depth = 512, int $options = 0): object
    {
        return $this->decode($json, false, $depth, $options);
    }

    /**
     * @return mixed
     * @throws JsonPackException
     */
    public function stringToArray(string $json, int $depth = 512, int $options = 0): array
    {
        return $this->decode($json, true, $depth, $options);
    }

    /**
     * @return mixed
     * @throws JsonPackException
     */
    public function decode(string $json, bool $assoc = true, int $depth = 512, int $options = 0)
    {
        if (! $this->isJson($json)) {
            throw new JsonPackException();
        }
        return json_decode($json, $assoc, $depth, 0);
    }

    /**
     * @throws JsonPackException
     */
    public function encode($value, int $options = JSON_UNESCAPED_UNICODE, int $depth = 512): string
    {
        $json = json_encode($value, $options, $depth);
        if ($json === false) {
            throw new JsonPackException();
        }
        return $json;
    }

    /**
     * @throws JsonPackException
     */
    public function objectToJson(object $object, int $options = JSON_UNESCAPED_UNICODE, int $depth = 512): string
    {
        return $this->encode($object, $options, $depth);
    }

    /**
     * @throws JsonPackException
     */
    public function arrayToJson(array $data, int $options = JSON_UNESCAPED_UNICODE, int $depth = 512): string
    {
        return $this->encode($data, $options, $depth);
    }
}
