<?php

namespace App\Domain\Repository;

use App\Domain\EntityObject\TaskDescription;
use App\Domain\EntityObject\TaskId;
use App\Domain\EntityObject\TaskTitle;
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
        $stm = $this->db->prepare(
            "SELECT * FROM tasks WHERE id = :id"
        );

        $stm->execute([
            "id" => $id
        ]);

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return json_encode([
                "message" => "Task Not Found."
            ]);
        }

        return new Task(new TaskTitle($result[0]["title"]), new TaskDescription($result[0]["description"]));
    }

    public function delete(Task $task): string
    {
        // $this->db->beginTransaction();

        // try{
        //     $stm = $this->db->prepare(
        //         "DELETE FROM tasks WHERE id = :id"
        //     );

        //     $stm->execute(
        //         $task->getId()
        //     )
        // }

        return "";
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
