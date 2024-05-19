<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Query;

interface QueryBus
{
    public function handle(Query $query) : Response|null;
}