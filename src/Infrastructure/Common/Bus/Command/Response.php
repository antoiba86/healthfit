<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Command;

interface Response
{
    public function jsonSerialize(): array;
}