<?php

namespace App\Controllers;

use App\Domain\EntityObject\TaskId;
use App\Domain\EntityObject\TaskTitle;
use App\Domain\EntityObject\TaskDescription;
use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepository;
use App\Domain\Service\CreateTaskService;
use App\Domain\Service\DeleteTaskService;
use App\Domain\Service\ReadTaskService;
use App\Domain\Service\UpdateTaskService;

class TaskController
{
    public function index() // done
    {
        $service = new ReadTaskService(new TaskRepository());

        return $service->getAll();
    }

    public function show(int $id) // done
    {
        $service = new ReadTaskService(new TaskRepository());

        $result = $service->getById($id);

        return [
            $result->getTitle()->getTitle(),
            $result->getDescription()->getDescription()
        ];
    }

    public function update(int $id, string $title, string $description)
    {
        $service = new UpdateTaskService(new TaskRepository());

        return $service->update($id, new Task(new TaskTitle($title), new TaskDescription($description)));
    }

    public function destroy(int $id) // done
    {
        $service = new DeleteTaskService(new TaskRepository());

        $result =  $service->delete(new TaskId($id));

        return $result;
    }

    public function create(string $title, string $description) // done
    {
        $taskTitle = new TaskTitle($title);

        $taskDescription = new TaskDescription($description);

        $taskRepository = new TaskRepository();

        $service = new CreateTaskService($taskRepository);

        $result = $service->createTask($taskTitle, $taskDescription);

        return $result;
    }
}
