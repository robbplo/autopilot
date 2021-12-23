<?php

namespace Autopilot\Drivers\Concerns;

interface RequiresRunning
{
    /**
     * Tasks required to run the driver
     */
    public function runningTasks(): array;
}
