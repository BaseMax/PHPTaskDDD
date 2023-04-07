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

    public function update(int $id, Task $task): array
    {
        return $this->taskRepository->update($id, $task);
    }
}
