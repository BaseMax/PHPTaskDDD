<?php

namespace App\Domain\Repository;

use App\Domain\EntityObject\TaskId;
use App\Domain\Model\Task;
use Exception;
use PDO;

class TaskRepository implements TaskRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $host = getenv("DB_HOST");

        $user = getenv("DB_USERNAME");

        $password = getenv("DB_PASSWORD");

        $database = getenv("DB_NAME");

        $this->db = new PDO("mysql:host=" . $host . ";dbname=" . $database, $user, $password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);
    }

    public function getById(int $id): ?Task
    {
        return null;
    }

    public function delete(Task $task): void
    {
    }

    public function save(Task $task): void
    {
        $this->db->beginTransaction();

        try {
            $stm = $this->db->prepare(
                "INSERT INTO tasks (title, description) VALUES (?, ?)"
            );

            $stm->execute([
                $task->getTitle(),
                $task->getDescription()
            ]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();

            throw new Exception("Can not create new Task");
        }
    }

    public function update(Task $task): void
    {
    }

    public function getAll(): array
    {
        return [];
    }
}
