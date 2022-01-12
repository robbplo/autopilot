<?php

namespace Drivers;

use Autopilot\Drivers\JupyterNotebookDriver;
use Autopilot\Repository;
use PHPUnit\Framework\TestCase;

class JupyterNotebookDriverTest extends TestCase
{
    /** @test */
    public function it_matches()
    {
        $repository = new Repository('git@bitlab.bit-academy.nl:221b9169-0a37-11ec-a943-4213e7ee7fac/00ae2a7c-0a38-11ec-a943-4213e7ee7fac/Gimme-Some-Nice-Notebooks-a83ec7f9-92f893d0.git');
        $repository->clone();

        $driver = new JupyterNotebookDriver($repository);

        $this->assertTrue($driver->matches());
    }
}
