<?php

namespace App\Domain\Repository;

use App\Domain\EntityObject\TaskId;
use App\Domain\Model\Task;

interface TaskRepositoryInterface
{
    public function getById(int $id): ?Task;

    public function save(Task $task): string|false;

    public function update(int $id, Task $task): array;

    public function delete(int $id): string|array;

    public function getAll(): array;
}
