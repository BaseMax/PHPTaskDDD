<?php

namespace App\Domain\Repository;

use App\Domain\EntityObject\TaskId;
use App\Domain\Model\Task;

interface TaskRepositoryInterface
{
    public function getById(int $id): ?Task;

    public function save(Task $task): void;

    public function update(Task $task): void;

    public function delete(Task $task): void;

    public function getAll(): array;
}
