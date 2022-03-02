<?php

namespace Autopilot\Tasks\Python;

use Autopilot\Tasks\Task;

class PatchRequirementsFile extends Task
{
    public function run()
    {
        $file = $this->repository()->dir()->getPath('requirements.txt');
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (PHP_OS_FAMILY !== "Windows") {
            $lines = array_filter($lines, function ($line) {
                return strpos($line, 'pywin') === false;
            });
        }

        file_put_contents($file, implode("\n", $lines));
    }

    public function message(): string
    {
        return 'Patching requirements file';
    }
}
