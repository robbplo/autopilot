<?php

namespace Autopilot\Drivers;

class PhpWebDriver extends Driver
{
    public function matches(): bool
    {
        return $this->repository->dir()->find('*.php') !== null;
    }

    public function setUp(): Driver
    {
        return $this;
    }

    public function serve(): Driver
    {
        passthru("php -S localhost:8000");

        return $this;
    }

    private function getPrimaryFile(): string
    {
        if ($index = $this->repository->dir()->find('index.php')) {
            return $index;
        }

        return $this->repository->dir()->find('*.php');
    }
}
