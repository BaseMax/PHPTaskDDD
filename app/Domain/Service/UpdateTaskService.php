<?php

namespace App\Domain\Service;

use App\Domain\Model\Task;
use App\Domain\Repository\TaskRepositoryInterface;

class UpdateTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(Task $task): void
    {
        $this->taskRepository->update($task);
    }
}
