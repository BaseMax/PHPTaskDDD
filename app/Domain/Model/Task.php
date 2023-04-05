<?php

namespace App\Domain\Model;

use App\Domain\EntityObject\TaskId;
use App\Domain\EntityObject\TaskTitle;
use App\Domain\EntityObject\TaskDescription;

class Task
{
    private TaskId $id;
    private TaskTitle $title;
    private TaskDescription $description;

    public function __construct(TaskId $id, TaskTitle $title, TaskDescription $description)
    {
        $this->id = $id;
        $this->title = $title;
        $description = $description;
    }

    public function getId(): TaskId
    {
        return $this->id;
    }

    public function getTitle(): TaskTitle
    {
        return $this->title;
    }

    public function getDescription(): TaskDescription
    {
        return $this->description;
    }

    public function setId(TaskId $id): void
    {
        $this->id = $id;
    }

    public function setTitle(TaskTitle $title): void
    {
        $this->title = $title;
    }

    public function setDescription(TaskDescription $description): void
    {
        $this->description = $description;
    }
}
