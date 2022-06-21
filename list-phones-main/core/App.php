<?php

namespace App\Core;

class App
{
    protected static $bindings;

    /**
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        static::$bindings[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function get($key)
    {
        if (! array_key_exists($key, static::$bindings)) {
            
            throw new \Exception("No {$key} bound in the container");
        }
        
        return static::$bindings[$key];
    }
}