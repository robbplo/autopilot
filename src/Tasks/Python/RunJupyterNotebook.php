<?php

namespace Autopilot\Tasks\Python;

use Autopilot\Tasks\Task;

class RunJupyterNotebook extends Task
{
    public function run()
    {
        $executable = $this->repository()->dir()->getPath('venv/bin/jupyter');

        exec("$executable notebook");
    }

    public function message(): string
    {
        return 'Running Jupyter...' . PHP_EOL . PHP_EOL;
    }
}
