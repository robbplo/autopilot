<?php

namespace Autopilot\Tasks\General;

use Autopilot\Tasks\Task;

class ChdirToRepository extends Task
{
    public function run()
    {
        chdir($this->repository()->dir()->getPath());
    }

    public function message(): string
    {
        return 'Setting working directory';
    }
}
