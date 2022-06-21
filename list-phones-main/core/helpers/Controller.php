<?php

namespace App\Core\Helpers;

class Controller
{
    /**
     * @param $name
     * @param array $data
     * @return mixed
     */
    protected function view($name, $data = [])
    {
        extract($data);

        return require "../assets/views/{$name}.view.php";
    }
}