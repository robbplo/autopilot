<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Drivers\Concerns\RequiresSetup;
use Autopilot\Tasks\General\ChdirToRepository;
use Autopilot\Tasks\Python\InstallPythonDependencies;
use Autopilot\Tasks\Python\PatchRequirementsFile;
use Autopilot\Tasks\Python\RunJupyterNotebook;
use Autopilot\Tasks\Python\SetupVirtualEnvironment;

class JupyterNotebookDriver extends Driver implements RequiresSetup, RequiresRunning
{
    public function matches(): bool
    {
        return $this->repository->dir()->find()->name('*.ipynb')->count() > 0;
    }

    public function setupTasks(): array
    {
        return [
            ChdirToRepository::class,
            SetupVirtualEnvironment::class,
            PatchRequirementsFile::class,
            InstallPythonDependencies::class,
        ];
    }

    public function runningTasks(): array
    {
        return [
            RunJupyterNotebook::class
        ];
    }
}
