<?php

namespace App\Domain\Service;

use App\Domain\EntityObject\TaskId;
use App\Domain\Repository\TaskRepositoryInterface;

class DeleteTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function delete(TaskId $id): void
    {

        $id = $id->getId();

        $this->taskRepository->delete($id);
    }
}
