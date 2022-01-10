<?php

namespace Autopilot\Tasks\Python;

use Autopilot\Tasks\Task;

class InstallPythonDependencies extends Task
{
    public function run()
    {
        $executable = $this->repository()->dir()->getPath('venv/bin/pip');

        exec("$executable install -r requirements.txt");
    }

    public function message(): string
    {
        return 'Installing dependencies from requirements.txt';
    }
}
