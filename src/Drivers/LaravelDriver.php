<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\PerformsSetupTasks;
use Autopilot\Tasks\DropAndCreateDatabase;
use Autopilot\Tasks\InstallComposerDependencies;
use Autopilot\Tasks\Laravel\CreateEnvFile;
use Autopilot\Tasks\Laravel\GenerateAppKey;
use Autopilot\Tasks\Laravel\MigrateAndSeed;
use Symfony\Component\Filesystem\Filesystem;

class LaravelDriver extends Driver implements PerformsSetupTasks
{
    public function matches(): bool
    {
        if ($this->repository->dir()->contains('artisan')) {
            return true;
        }

        // @todo maybe all drivers should attempt subdirectories
        return $this->attemptMatchInSubdirectory();
    }


    public function serve(): Driver
    {
        $artisan = $this->repository->dir()->getPath('artisan');


        exec("python -m webbrowser http://127.0.0.1:8000");
        echo passthru("php {$artisan} serve");

        return $this;
    }

    public function setupTasks(): array
    {
        return [
            InstallComposerDependencies::class,
            CreateEnvFile::class,
            GenerateAppKey::class,
            DropAndCreateDatabase::class,
            MigrateAndSeed::class
        ];
    }

    private function attemptMatchInSubdirectory(): bool
    {
        $finder = $this->repository->dir()->find()
            ->depth(1)
            ->name('artisan');

        if ($finder->count() === 0) {
            return false;
        }

        $file = array_values(iterator_to_array($finder))[0];
        $this->moveSubdirectoryToRoot($file->getPath());

        return true;
    }

    private function moveSubdirectoryToRoot(string $subdirectory)
    {
        $fs = new Filesystem();

        $dir = $this->repository->dir();
        $fs->rename($subdirectory, $dir->getPath('../temp'), true);
        $fs->rename($dir->getPath('../temp'), $dir->getPath('../repository'), true);
    }
}
