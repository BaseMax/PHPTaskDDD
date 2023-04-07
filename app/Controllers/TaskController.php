<?php

namespace App\Controllers;

use App\Domain\EntityObject\TaskId;
use App\Domain\EntityObject\TaskTitle;
use App\Domain\EntityObject\TaskDescription;
use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\Domain\Service\CreateTaskService;

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
        $taskTitle = new TaskTitle($title);

        $taskDescription = new TaskDescription($description);

        $taskRepository = new TaskRepository();

        $service = new CreateTaskService($taskRepository);

        $result = $service->createTask($taskTitle, $taskDescription);

        return $result;
    }
}
