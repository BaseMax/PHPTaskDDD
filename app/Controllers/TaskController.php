<?php

namespace App\Controllers;

class TaskController
{
    public function index()
    {
        echo "index";
    }

    public function show(int $id)
    {
        echo "show $id";
    }

    public function update(int $id, string $title = null, string $description = null)
    {
        echo "update $id";
    }

    public function destroy(int $id)
    {
        echo "destroy $id";
    }

    public function create(string $title, string $description)
    {
        echo "create";
    }
}
