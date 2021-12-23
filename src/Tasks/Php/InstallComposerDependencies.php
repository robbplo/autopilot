<?php

namespace Autopilot\Tasks\Php;

use Autopilot\Tasks\Task;

class InstallComposerDependencies extends Task
{
    public function message(): string
    {
        return "Installing composer dependencies";
    }

    public function run()
    {
        $dir = $this->repository()->dir()->getPath();

        exec("composer install -q --working-dir=$dir");
    }
}
