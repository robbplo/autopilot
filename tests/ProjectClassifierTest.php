<?php

namespace Tests;

use Autopilot\ProjectClassifier;
use Autopilot\Repository;
use Tests\Drivers\PhpWebDriver;

class ProjectClassifierTest extends TestCase
{
    ///** @test */
    //public function it_classifies_php_web_project()
    //{
    //    $repository = new Repository("git@bitlab.bit-academy.nl:803ce71e-0a33-11ec-a943-4213e7ee7fac/85651f04-0a5a-11ec-a943-4213e7ee7fac/Ben-je-boos-a6b8a963-2e2e6e37.git");
    //    $repository->clone();
    //
    //    $classifier = new ProjectClassifier($repository);
    //
    //    $driver = $classifier->selectDriver();
    //
    //    $this->assertInstanceOf(PhpWebDriver::class, get_class($driver));
    //}


}
