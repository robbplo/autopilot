<?php

namespace Autopilot\Tasks\Python;

use Autopilot\Tasks\Task;

class SetupVirtualEnvironment extends Task
{
    public function run()
    {
        exec('virtualenv venv');
    }

    public function message(): string
    {
        return 'Setting up virtual environment';
    }
}
