<?php

namespace App\Domain\Service;

use App\Domain\Model\Task;
use App\Domain\EntityObject\TaskId;
use App\Domain\EntityObject\TaskTitle;
use App\Domain\EntityObject\TaskDescription;
use App\Domain\Repository\TaskRepositoryInterface;

class CreateTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(TaskTitle $title, TaskDescription $description)
    {
        $task = new Task($title, $description);

        $this->taskRepository->save($task);
    }
}
