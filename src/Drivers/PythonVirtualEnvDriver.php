<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Drivers\Concerns\RequiresSetup;
use Autopilot\Tasks\General\ChdirToRepository;
use Autopilot\Tasks\Python\InstallPythonDependencies;
use Autopilot\Tasks\Python\RunScriptInVirtualEnvironment;
use Autopilot\Tasks\Python\SetupVirtualEnvironment;

class PythonVirtualEnvDriver extends Driver implements RequiresSetup, RequiresRunning
{
    public function matches(): bool
    {
        return $this->repository->dir()->contains('requirements.txt');
    }

    public function setupTasks(): array
    {
        return [
            ChdirToRepository::class,
            SetupVirtualEnvironment::class,
            InstallPythonDependencies::class,
        ];
    }

    public function runningTasks(): array
    {
        return [
            RunScriptInVirtualEnvironment::class,
        ];
    }
}
