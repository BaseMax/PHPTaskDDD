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
        $host = $_ENV["DB_HOST"];

        $user = $_ENV["DB_USERNAME"];

        $password = $_ENV["DB_PASSWORD"];

        $database = $_ENV["DB_NAME"];

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

    public function save(Task $task): string|false
    {
        $this->db->beginTransaction();

        try {
            $stm = $this->db->prepare(
                "INSERT INTO tasks (title, description) VALUES (?, ?)"
            );

            $stm->execute([
                $task->getTitle()->getTitle(),
                $task->getDescription()->getDescription()
            ]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();

            throw new Exception("Can not create new Task");
        }

        return json_encode([
            "message" => "task created successfuly"
        ]);
    }

    public function update(Task $task): void
    {
    }

    public function getAll(): array
    {
        $stm = $this->db->prepare(
            "SELECT * FROM tasks"
        );

        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
