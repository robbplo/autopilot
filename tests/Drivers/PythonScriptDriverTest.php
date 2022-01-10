<?php

namespace Drivers;

use Autopilot\Drivers\PythonScriptDriver;
use Autopilot\Repository;
use PHPUnit\Framework\TestCase;

class PythonScriptDriverTest extends TestCase
{
    /** @test */
    public function it_matches()
    {
        $repository = new Repository("git@bitlab.bit-academy.nl:ceae8dbb-4b83-11ec-a0c6-4213e7ee7fac/2c811487-1082-11ec-a7a6-4213e7ee7fac/Hello-world-ca0aef52-63206bf1.git");
        $repository->clone();

        $driver = new PythonScriptDriver($repository);

        $this->assertTrue($driver->matches());
    }
}
