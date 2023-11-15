<?php

namespace Goldoni\CoreProcess\Processes;

use Goldoni\CoreProcess\Processes\Contracts\ModelPayloadInterface;
use Goldoni\CoreProcess\Processes\Contracts\TaskInterface;
use Illuminate\Support\Facades\Pipeline;

abstract class AbstractProcess
{
    /**
     * @var array<int, TaskInterface>
     */
    protected array $tasks;

    public function handle(ModelPayloadInterface $payload): mixed
    {
        return Pipeline::send(
            passable: $payload,
        )->through(
            pipes: $this->tasks,
        )->thenReturn();
    }
}
