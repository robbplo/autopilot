<?php

namespace Autopilot;

use Symfony\Component\Filesystem\Filesystem;

class Repository
{
    private $repoUrl;

    public function __construct(string $repoUrl)
    {
        $this->repoUrl = $repoUrl;
    }

    public function clone(): void
    {
        if (file_exists($this->getPath())) {
            exec('git pull -q --ff-only '. $this->getPath());
            return;
        }
        // @allow user to choose where projects are cloned
        exec("git clone -q $this->repoUrl " . $this->getPath());
    }

    public function findFile(string $file): ?string
    {
        $files = glob($this->getPath($file));

        if ((new Filesystem())->exists($files)) {
            return $files[0];
        }

        return null;
    }

    public function contains(string $file): bool
    {
        return $this->findFile($file) !== null;
    }

    public function getPath(string $file = null): string
    {
        $basename = basename($this->repoUrl);

        if (strpos($basename, '.') !== false) {
            $basename = explode('.', $basename)[0];
        }

        $path = __DIR__ . '/../projects/' . $basename;

        if ($file !== null) {
            $path .= "/$file";
        }

        return $path;
    }
}
