<?php

namespace Autopilot\Drivers;

use Symfony\Component\Finder\Finder;

class PhpCliDriver extends Driver
{
    public function matches(): bool
    {
        return $this->finder()->count() > 0;
    }

    public function setUp(): Driver
    {
        return $this;
    }

    public function serve(): Driver
    {
        $file = $this->getPrimaryFile();
        $path = $this->repository->dir()->getPath($file);
        echo "Guessed primary file: $file. Executing..." . PHP_EOL . PHP_EOL;

        chdir($this->repository->dir()->getPath());
        passthru("php $path");

        return $this;
    }

    protected function getPrimaryFile(): string
    {
        if ($this->repository->dir()->contains('index.php')) {
            return 'index.php';
        }

        foreach ($this->finder() as $file) {
            return $file->getFilename();
        }
    }

    private function finder(): Finder
    {
        return $this->repository->dir()->find()
            ->depth(0)
            ->name('*.php');
    }
}
