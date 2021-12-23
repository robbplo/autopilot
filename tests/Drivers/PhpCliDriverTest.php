<?php

namespace Tests\Drivers;

use Autopilot\Drivers\PhpCliDriver;
use Autopilot\Repository;

class PhpCliDriverTest extends DriverTest
{
    /** @test */
    public function it_matches_php_cli_project()
    {
        $repository = new Repository("git@bitlab.bit-academy.nl:803ce71e-0a33-11ec-a943-4213e7ee7fac/85651f04-0a5a-11ec-a943-4213e7ee7fac/Ben-je-boos-a6b8a963-2e2e6e37.git");
        $repository->clone();

        $driver = new PhpCliDriver($repository);

        $this->assertTrue($driver->matches());
    }
}
