<?php

namespace Autopilot\Tasks\Laravel;

use Autopilot\Tasks\Task;

abstract class ArtisanTask extends Task
{
    protected function artisan(string $command): string
    {
        $artisan = $this->repository()->dir()->getPath('artisan');

        return "php $artisan $command";
    }
}
