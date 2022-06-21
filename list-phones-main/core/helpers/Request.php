<?php

namespace App\Core\Helpers;

class Request
{
    public static function uri(): string
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        return array_filter($_GET);
    }
}