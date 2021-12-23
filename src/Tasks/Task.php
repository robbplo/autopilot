<?php

namespace Autopilot\Tasks;

use Autopilot\Repository;

abstract class Task
{
    private $repository;

    abstract public function run();

    // @todo might only need Directory as dependency
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    abstract public function message(): string;

    protected function repository(): Repository
    {
        return $this->repository;
    }
}
