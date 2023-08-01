<?php

declare(strict_types=1);
/**
 * This is an extension of Death-Satan
 * Name PHP-Excel
 *
 * @link     https://www.cnblogs.com/death-satan
 */
namespace DeathSatan\JsonTool;

/**
 * @method bool isJson(string $json) static
 * @method object stringToObject(string $json,int $depth = 512,int $options = 0) static
 * @method mixed decode(string $json,bool $assoc = true,int $depth = 512,int $options = 0) static
 * @method string encode($value,int $options = JSON_UNESCAPED_UNICODE,int $depth = 512) static
 * @method string objectToJson(object $object,int $options = JSON_UNESCAPED_UNICODE,int $depth = 512) static
 * @method string arrayToJson(array $data,int $options = JSON_UNESCAPED_UNICODE,int $depth = 512) static
 */
class JsonToolFace
{
    public function __callStatic($name, $arguments)
    {
        $jsonTool = self::getJsonTool();
        if (method_exists($jsonTool, $name)) {
            return call_user_func_array([$jsonTool, $name], $arguments);
        }
    }

    private static function getJsonTool(): JsonTool
    {
        return new JsonTool();
    }
}
