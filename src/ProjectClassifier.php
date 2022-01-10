<?php

namespace Autopilot;

use Autopilot\Drivers\DefaultDriver;
use Autopilot\Drivers\Driver;
use Autopilot\Drivers\LaravelDriver;
use Autopilot\Drivers\PhpCliDriver;
use Autopilot\Drivers\PhpWebDriver;
use Autopilot\Drivers\PythonScriptDriver;
use Autopilot\Drivers\PythonVirtualEnvDriver;

class ProjectClassifier
{
    private static $drivers = [
        LaravelDriver::class,
        PhpWebDriver::class,
        PhpCliDriver::class,
        PythonVirtualEnvDriver::class,
        PythonScriptDriver::class,
    ];

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function selectDriver(): Driver
    {
        foreach (self::$drivers as $driver) {
            $driver = new $driver($this->repository);

            if ($driver->matches())  {
                return $driver;
            }
        }

        return new DefaultDriver($this->repository);
    }
}
