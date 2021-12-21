<?php

namespace Autopilot\Drivers;

class PhpWebDriver extends PhpCliDriver
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

    public function serve(): Driver
    {
        $url = "localhost:8000";
        $file = $this->getPrimaryFile();
        chdir($this->repository->dir()->getPath());
        exec("python -m webbrowser http://$url/$file");
        passthru("php -S {$url}");

        return $this;
    }
}
