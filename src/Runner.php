<?php

namespace Autopilot;

use Autopilot\Tasks\Task;
use Symfony\Component\Console\Style\OutputStyle;

class Runner
{
    private $repository;
    private $output;

    public function __construct(Repository $repository, OutputStyle $output)
    {
        $this->repository = $repository;
        $this->output = $output;
    }

    public function runTasks(array $tasks)
    {
        foreach ($tasks as $taskClass) {
            /** @var Task $task */
            $task = new $taskClass($this->repository, $this->output);
            $task->run();
        }
    }

}
