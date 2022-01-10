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
        passthru("python $path"); //  @todo does not work with pythons `input` function
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
