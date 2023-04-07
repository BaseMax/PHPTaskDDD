<?php

namespace App\Application;

use App\Controllers\TaskController;

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
        $method = $this->request->getMethod();

        $controller = new TaskController();

        $fullPath = $this->request->getFullPath();

        if ($method === "post") {
            $title = $this->request->getTitle();

            $description = $this->request->getDescription();

            if ($title && $description) {
                return $controller->create($title, $description);
            }

            header('Content-Type: application/json; charset=utf-8');

            return json_encode([
                "message" => "Invalid Input"
            ]);
        } else if ($method === "get") {

            if (count($fullPath) === 1) {
                return $controller->index();
            } else if (count($fullPath) === 2) {
                return $controller->show((int) $fullPath[1]);
            }

            header('Content-Type: application/json; charset=utf-8');

            return json_encode([
                "message" => "Invalid Input"
            ]);
        } else if ($method === "delete") {

            if (count($fullPath) !== 2) {
                header('Content-Type: application/json; charset=utf-8');

                return json_encode([
                    "message" => "Not Found"
                ]);
            }

            return $controller->destroy((int) $fullPath[1]);
        } else if ($method === "put") {
            if (count($fullPath) !== 2) {
                header('Content-Type: application/json; charset=utf-8');

                return json_encode([
                    "message" => "Not Found"
                ]);
            }

            return $controller->update((int) $fullPath[1], $this->request->getUpdateTitle(), $this->request->getUpdateDescription());
        }
    }
}
