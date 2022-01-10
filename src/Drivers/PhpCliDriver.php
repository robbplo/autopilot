<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Tasks\General\ChdirToRepository;
use Autopilot\Tasks\Php\RunFileInCli;

class PhpCliDriver extends Driver implements RequiresRunning
{
    public function matches(): bool
    {
        return $this->finder()->count() > 0;
    }

    public function runningTasks(): array
    {
        return [
            ChdirToRepository::class,
            RunFileInCli::class,
        ];
    }

    private function finder()
    {
        return $this->repository->dir()->find()
            ->depth(0)
            ->name('*.php');
    }
}
