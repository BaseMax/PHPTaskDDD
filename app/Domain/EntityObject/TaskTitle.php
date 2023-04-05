<?php

namespace App\Domain\EntityObject;

use Exception;

class TaskTitle
{
    private string $title;

    public function __construct(string $title)
    {
        if (empty(trim($title))) {
            throw new Exception("Title Can not be Empty");
        }

        $this->title = trim($title);
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
