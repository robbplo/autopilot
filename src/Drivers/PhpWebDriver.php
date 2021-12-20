<?php

namespace Autopilot\Drivers;

class PhpWebDriver extends Driver
{
    public function matches(): bool
    {
        return $this->repository->contains('*.php');
    }

    public function setUp(): Driver
    {
        return $this;
    }

    public function serve(): Driver
    {
        exec('open localhost:8000/'. $this->getPrimaryFile());
        exec("php -S localhost:8000");

        return $this;
    }

    private function getPrimaryFile(): string
    {
        if ($index = $this->repository->findFile('index.php')) {
            return $index;
        }

        return $this->repository->findFile('*.php');
    }
}
