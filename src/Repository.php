<?php

namespace Autopilot;

use CzProject\GitPhp\Git;
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
        $git = new Git();

        // @todo allow user to choose where projects are cloned
        if (file_exists($this->getPath())) {
            $git->open($this->getPath())->pull($this->repoUrl);
            return;
        }

        $git->cloneRepository($this->repoUrl, $this->getPath());
    }

    public function findFile(string $file): ?string
    {
        $files = glob($this->getPath($file));

        if (count($files) > 0 && (new Filesystem())->exists($files[0])) {
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
