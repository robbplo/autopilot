<?php

namespace Autopilot\Tasks;

use Autopilot\Repository;
use Symfony\Component\Console\Style\OutputStyle;

class Runner
{
    private $repository;
    private $output;

    public function __construct(Repository $repository, OutputStyle $output = null)
    {
        $this->repository = $repository;
        $this->output = $output;
    }

    public function run(string $taskType)
    {
        /** @var Task $task */
        $task = new $taskType($this->repository);

        if ($this->output instanceof OutputStyle) {
            $this->output->writeln($task->message());
        }

        $task->run();

    }

    public function runMany(array $tasks)
    {
        foreach ($tasks as $taskType) {
            $this->run($taskType);
        }
    }

}
