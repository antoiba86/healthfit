<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Query;

interface Response
{
    public function jsonSerialize(): array;
}