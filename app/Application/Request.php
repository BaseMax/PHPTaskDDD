<?php

namespace App\Application;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";

        $questionPosition = strpos($path, "?");

        if (!$questionPosition) {
            return $path;
        }

        $path = substr($path, 0, $questionPosition);

        return $path;
    }

    public function getMethod(): string
    {
        $method = $_SERVER["REQUEST_METHOD"];

        return strtolower($method);
    }

    public function getFullPath(): array
    {
        $path = $this->getPath();

        $pathContent = explode("/", $path);

        array_shift($pathContent);

        return $pathContent;
    }

    public function getTitle(): string|false
    {
        return trim($_POST["title"]) ?? false;
    }

    public function getDescription(): string|false
    {
        return trim($_POST["description"]) ?? false;
    }
}
