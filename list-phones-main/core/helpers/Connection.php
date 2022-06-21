<?php

namespace App\Core\Helpers;

class Connection
{
    /**
     * @param $config
     * @return \PDO
     */
    public static function make($config): \PDO
    {
        try {
            return new \PDO($config['connection']);
        } catch(\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
