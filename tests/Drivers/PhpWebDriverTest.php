<?php

namespace Tests\Drivers;

use Autopilot\Drivers\PhpWebDriver;
use Autopilot\Repository;

class PhpWebDriverTest extends DriverTest
{
    /** @test */
    public function it_matches_php_web_project_without_index()
    {
        $repository = new Repository("git@bitlab.bit-academy.nl:803ce71e-0a33-11ec-a943-4213e7ee7fac/6cf5b9c7-0a5a-11ec-a943-4213e7ee7fac/Schaakmat-7e3d460f-40e4da03.git");
        $repository->clone();

        $driver = new PhpWebDriver($repository);

        $this->assertTrue($driver->matches());
    }

}
