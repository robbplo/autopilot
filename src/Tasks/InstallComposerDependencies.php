<?php

namespace Autopilot\Tasks;

class InstallComposerDependencies extends Task
{
    public function run()
    {
        $this->output()->writeln("Installing composer dependencies");

        $dir = $this->repository()->dir()->getPath();

        exec("composer install -q --working-dir=$dir");
    }

}
