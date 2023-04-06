<?php

namespace App\Application;

class Router
{

    protected array $routes = [
        "get",
        "post",
        "put",
        "delete"
    ];

    public Request $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->routes["delete"][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->routes["put"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->getMethod();

        $callbacks = $this->routes[$method];

        $fullPath = $this->request->getFullPath();

        foreach ($callbacks as $route => $callback) {

            $route = explode("/", $route);

            if ($this->checker($fullPath, $route)) {
            }
        }
    }

    protected function checker(array $currectRoute, array $route): bool|int
    {
    }
}
