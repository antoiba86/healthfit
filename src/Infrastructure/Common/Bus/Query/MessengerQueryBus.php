<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Query;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessengerQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    public function handle(Query $query): array|Response
    {
        return $this->handleQuery($query);
    }
}