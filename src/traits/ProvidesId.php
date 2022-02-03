<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

trait ProvidesId
{
    protected string $id;

    public function getId(): string;

    protected function setId(string $id): void
    {
        $this->id = $id;
    }
}
