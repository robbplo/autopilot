<?php

namespace Autopilot\Tasks\General;

use Autopilot\Tasks\Task;

class OpenTextEditor extends Task
{
    public function run()
    {
        // @todo allow user to select program
        $executable = 'code';
        $directory = $this->repository()->dir()->getPath();

        exec("$executable $directory");
    }

    public function message(): string
    {
        return 'Opening text editor';
    }
}
