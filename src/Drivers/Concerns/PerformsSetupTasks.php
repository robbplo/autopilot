<?php

namespace Autopilot\Drivers\Concerns;

interface PerformsSetupTasks
{
    /**
     * Tasks required to set up the driver
     */
    public function setupTasks(): array;
}
