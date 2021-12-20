<?php

namespace Autopilot;

use Tests\Drivers\Driver;

class Runner
{
    private $driver;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }
}
