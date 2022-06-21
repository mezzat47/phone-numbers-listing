<?php

namespace App\Core\Helpers;

class Router
{
    protected $routes = [
        'GET' => []
    ];

    /**
     * @param $file
     * @return Router
     */
    public static function load($file): Router
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $requestType
     * @return mixed
     * @throws \Exception
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }

        throw new \Exception('Wrong Route');
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     * @throws \Exception
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controller\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new \Exception("{$controller} does not respond to {$action} action.");
        }

        return $controller->$action();
    }
}