<?php

namespace Autopilot\Drivers;

use Autopilot\Repository;

abstract class Driver
{
    /** @var Repository  */
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Determines if the given repository can be served by this driver.
     *
     * @return bool
     */
    abstract public function matches(): bool;
}
