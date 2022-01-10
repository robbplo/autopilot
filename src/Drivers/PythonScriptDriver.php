<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Tasks\General\ChdirToRepository;
use Autopilot\Tasks\Python\RunScript;

class PythonScriptDriver extends Driver implements RequiresRunning
{
    public function matches(): bool
    {
        return $this->repository->dir()->find()
                ->name('*.py')
                ->count() > 0;
    }

    public function runningTasks(): array
    {
        return [
            ChdirToRepository::class,
            RunScript::class,
        ];
    }
}
