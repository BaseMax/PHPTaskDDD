<?php

namespace App\Domain\Service;

use App\Domain\Model\Task;
use App\Domain\EntityObject\TaskId;
use App\Domain\Repository\TaskRepositoryInterface;

class ReadTaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getById(TaskId $id): Task
    {

        $id = $id->getId();

        return $this->taskRepository->getById($id);
    }

    public function getAll(): array
    {
        return $this->taskRepository->getAll();
    }
}
