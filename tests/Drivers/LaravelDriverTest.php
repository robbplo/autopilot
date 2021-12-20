<?php

namespace Tests\Drivers;

use Autopilot\Drivers\LaravelDriver;
use Autopilot\Repository;
use Symfony\Component\Filesystem\Filesystem;

class LaravelDriverTest extends DriverTest
{
    /** @test */
    public function it_matches_empty_laravel_project()
    {
        $repository = new Repository("https://github.com/robbplo/empty-laravel");
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
        $driver->setUp();

        $envFile = $repository->getPath('.env');
        $this->assertFileExists($envFile);

        $databaseInEnv = strpos(file_get_contents($envFile), 'DB_DATABASE=' . $driver->getDatabaseName()) !== false;

        $this->assertTrue($databaseInEnv);
    }

}
