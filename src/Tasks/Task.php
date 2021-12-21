<?php

namespace Autopilot\Tasks;

use Autopilot\Repository;
use Symfony\Component\Console\Style\OutputStyle;

abstract class Task
{
    private $repository;
    private $output;

    abstract public function run();

    public function __construct(Repository $repository, OutputStyle $output)
    {
        $this->repository = $repository;
        $this->output = $output;
    }

    protected function repository(): Repository
    {
        return $this->repository;
    }

    protected function output(): OutputStyle
    {
        return $this->output;
    }
}
