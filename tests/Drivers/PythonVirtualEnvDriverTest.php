<?php

namespace Drivers;

use Autopilot\Drivers\PythonVirtualEnvDriver;
use Autopilot\Repository;
use PHPUnit\Framework\TestCase;

class PythonVirtualEnvDriverTest extends TestCase
{

    /** @test */
    public function it_matches()
    {
        $repository = new Repository('git@bitlab.bit-academy.nl:1f92ce4c-4b84-11ec-a0c6-4213e7ee7fac/e2a0997b-4219-11ec-a0c6-4213e7ee7fac/Bieps-Per-Minute-11e57750-fcd48921.git');
        $repository->clone();

        $driver = new PythonVirtualEnvDriver($repository);

        $this->assertTrue($driver->matches());
    }
}
