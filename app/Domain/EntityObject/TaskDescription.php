<?php

namespace App\Domain\EntityObject;

use Exception;

class TaskDescription
{
    private string $description;

    public function __construct(string $description)
    {
        if (empty(trim($description))) {
            return [
                "message" => "Description Can not be Empty"
            ];
        }

        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
