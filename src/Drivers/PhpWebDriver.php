<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Tasks\Php\ServePhp;

class PhpWebDriver extends Driver implements RequiresRunning
{
    public function matches(): bool
    {
        $patterns = [
            '$_COOKIE',
            '$_GET',
            '$_POST',
            '<html',
            '<head',
            '<body',
        ];

        return $this->repository->dir()->find()
                ->name('*.php')
                ->contains($patterns)
                ->count() > 0;
    }


    public function runningTasks(): array
    {
        return [
            ServePhp::class,
        ];
    }
}
