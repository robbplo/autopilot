<?php

namespace Autopilot\Drivers;

use Autopilot\Drivers\Concerns\RequiresRunning;
use Autopilot\Drivers\Concerns\RequiresSetup;
use Autopilot\Tasks\General\DropAndCreateDatabase;
use Autopilot\Tasks\General\OpenBrowser;
use Autopilot\Tasks\Laravel\CreateEnvFile;
use Autopilot\Tasks\Laravel\GenerateAppKey;
use Autopilot\Tasks\Laravel\MigrateAndSeed;
use Autopilot\Tasks\Laravel\ServeLaravel;
use Autopilot\Tasks\Php\InstallComposerDependencies;
use Symfony\Component\Filesystem\Filesystem;

class LaravelDriver extends Driver implements RequiresSetup, RequiresRunning
{
    public function matches(): bool
    {
        if ($this->repository->dir()->contains('artisan')) {
            return true;
        }

        // @todo this does not belong in driver
        return $this->attemptMatchInSubdirectory();
    }

    public function runningTasks(): array
    {
        return [
            OpenBrowser::class,
            ServeLaravel::class,
        ];
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
