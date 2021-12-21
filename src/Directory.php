<?php

namespace Autopilot;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Finder\Finder;

class Directory
{
    private $path;
    private $fs;

    public function __construct(string $path)
    {
        $this->path = Path::canonicalize($path);
        $this->fs = new Filesystem();
    }

    public function deleteIfExists()
    {
        if ($this->fs->exists($this->getPath())) {
            $this->fs->remove($this->getPath());
        }
    }

    public function getPath(string $file = null): string
    {
        if ($file !== null) {
            return Path::join($this->path, $file);
        }
        return $this->path;
    }

    public function find(): Finder
    {
        return (new Finder())->in($this->getPath());
    }

    public function contains(string $file): bool
    {
        return $this->fs->exists($this->getPath($file));
    }
}
