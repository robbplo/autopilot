<?php

namespace Autopilot\Tasks\Python;

class RunScriptInVirtualEnvironment extends RunScript
{
    public function run()
    {
        $executable = $this->repository()->dir()->getPath('venv/bin/python');
        $path = $this->repository()->dir()->getPath($this->primaryFile);

        // -u is to prevent input calls from buffering until after the script is executed
        passthru("$executable -u $path");
    }
}
