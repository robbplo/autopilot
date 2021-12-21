<?php

namespace Autopilot\Drivers;

use Symfony\Component\Filesystem\Filesystem;

class LaravelDriver extends Driver
{
    public function matches(): bool
    {
        if ($this->repository->dir()->contains('artisan')) {
            return true;
        }

        // @todo maybe all drivers should attempt subdirectories
        return $this->attemptMatchInSubdirectory();
    }

    public function setUp(): Driver
    {
        $this->installDependencies();
        $this->createEnvFile();
        $this->generateAppKey();
        $this->createDatabase();
        $this->setEnvDatabase();
        $this->migrateAndSeed();

        return $this;
    }

    public function serve(): Driver
    {
        $artisan = $this->repository->dir()->getPath('artisan');

        echo passthru("php {$artisan} serve");

        return $this;
    }

    public function getDatabaseName(): string
    {
        return "autopilot";
    }

    private function createDatabase(): void
    {
        // @todo this seems really unsafe :) maybe replace with proper sql client
        exec(sprintf(
            'mysql -q --user=bit_academy --password=bit_academy -e "drop database if exists %s; create database %s" > /dev/null 2>&1',
            $this->getDatabaseName(),
            $this->getDatabaseName()
        ));
    }

    private function createEnvFile(): void
    {
        copy($this->repository->dir()->getPath('.env.example'), $this->repository->dir()->getPath('.env'));
    }

    private function setEnvDatabase(): void
    {
        $path = $this->repository->dir()->getPath('.env');

        $envFile = file_get_contents($path);
        $envFile = preg_replace("/DB_DATABASE=.+/", 'DB_DATABASE=' . $this->getDatabaseName(), $envFile);
        file_put_contents($path, $envFile);
    }

    private function installDependencies(): void
    {
        $dir = $this->repository->dir()->getPath();
        exec("composer install -q --working-dir=$dir");
    }

    private function migrateAndSeed(): void
    {
        $artisan = $this->repository->dir()->getPath('artisan');

        exec("php {$artisan} migrate --seed");
    }

    private function generateAppKey(): void
    {
        $artisan = $this->repository->dir()->getPath('artisan');

        passthru("php {$artisan} key:generate");
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
