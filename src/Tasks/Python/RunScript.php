<?php

namespace Autopilot\Tasks\Python;

use Autopilot\Repository;
use Autopilot\Tasks\Task;

class RunScript extends Task
{
    private $primaryFile;

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);

        $this->primaryFile = $this->getPrimaryFile();
    }

    public function run()
    {
        $path = $this->repository()->dir()->getPath($this->primaryFile);

        chdir($this->repository()->dir()->getPath());
        
        // -u is to prevent input calls from buffering until after the script is executed
        passthru("python -u $path");
    }

    public function message(): string
    {
        return "Guessed primary file: $this->primaryFile. Executing..." . PHP_EOL . PHP_EOL;
    }

    private function getPrimaryFile(): string
    {
        $finder = $this->repository()->dir()->find()
            ->depth(0)
            ->name('*.py');

        foreach ($finder as $file) {
            return $file->getFilename();
        }
    }
}
