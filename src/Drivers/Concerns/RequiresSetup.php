<?php

namespace Autopilot\Drivers\Concerns;

interface RequiresSetup
{
    /**
     * Tasks required to set up the driver
     */
    public function setupTasks(): array;
}
