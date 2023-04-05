<?php

namespace App\Domain\EntityObject;

use Ramsey\Uuid\Uuid;

class TaskId
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function equals(TaskId $id): bool
    {
        return $this->getId()->equals($id->getId());
    }
}
