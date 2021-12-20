<?php

namespace Tests\Utils;

use Symfony\Component\Filesystem\Filesystem;

class ProjectsDirectory
{
    private static $projectDir = __DIR__ . '/../../projects';

    public static function get(): string
    {
        return self::$projectDir;
    }

    public static function clear()
    {
        $fs = new Filesystem();
        $fs->remove(glob(self::$projectDir . '/*'));
    }
}
