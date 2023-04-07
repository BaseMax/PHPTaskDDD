<?php

namespace App\Domain\EntityObject;

use Exception;

class TaskDescription
{
    private string $description;

    public function __construct(string $description)
    {
        if (empty(trim($description))) {
            throw new Exception("Title Can not be Empty");
        }

        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
