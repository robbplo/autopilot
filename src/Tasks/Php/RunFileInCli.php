<?php

namespace Autopilot\Tasks\Php;

use Autopilot\Repository;
use Autopilot\Tasks\Task;

class RunFileInCli extends Task
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

        passthru("php $path");
    }

    public function message(): string
    {
        return "Guessed primary file: $this->primaryFile. Executing..." . PHP_EOL . PHP_EOL;
    }

    private function getPrimaryFile(): string
    {
        if ($this->repository()->dir()->contains('index.php')) {
            return 'index.php';
        }

        $finder = $this->repository()->dir()->find()
            ->depth(0)
            ->name('*.php');

        foreach ($finder as $file) {
            return $file->getFilename();
        }
    }
}
