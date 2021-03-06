<?php

namespace Tests\Drivers;

use Autopilot\Drivers\LaravelDriver;
use Autopilot\Repository;
use Autopilot\Tasks\Runner;

class LaravelDriverTest extends DriverTest
{
    /** @test */
    public function it_matches_default_laravel_project()
    {
        $repository = new Repository("https://github.com/robbplo/empty-laravel");
        $repository->clone();
        $driver = new LaravelDriver($repository);

        $this->assertTrue($driver->matches());
    }

    /** @test */
    public function it_matches_laravel_project_in_subdirectory()
    {
        $repository = new Repository("git@bitlab.bit-academy.nl:221b9169-0a37-11ec-a943-4213e7ee7fac/d2a8bcaa-0a37-11ec-a943-4213e7ee7fac/Modelling-Is-Paramount-25a726e6-4a9f49dc.git");
        $repository->clone();

        $driver = new LaravelDriver($repository);

        $this->assertTrue($driver->matches());
    }

    /** @test */
    public function it_sets_up_laravel_application()
    {
        $repository = new Repository("https://github.com/robbplo/empty-laravel");
        $repository->clone();

        $driver = new LaravelDriver($repository);

        $runner = new Runner($repository);
        $runner->runMany($driver->setupTasks());

        $envFile = $repository->dir()->getPath('.env');
        $this->assertFileExists($envFile);
    }

}
