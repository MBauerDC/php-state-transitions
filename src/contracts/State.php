<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface State extends HasId
{
    public function getDescription(): ?string;
    
    public function hasData(string $key): bool;
    
    public function getData(string $key): mixed;

    public function getAllDataAsArray(): array;
}
