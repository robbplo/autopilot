<?php

namespace Autopilot\Drivers;

class PhpWebDriver extends Driver
{
    public function matches(): bool
    {
        $patterns = [
            '$_COOKIE',
            '$_GET',
            '$_POST',
            '<html',
            '<head',
            '<body',
        ];

        return $this->repository->dir()->find()
                ->name('*.php')
                ->contains($patterns)
                ->count() > 0;
    }

    public function setUp(): Driver
    {
        return $this;
    }

    public function serve(): Driver
    {
        passthru("php -S localhost:8000");
        // @todo open browser

        return $this;
    }
}
