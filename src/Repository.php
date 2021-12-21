<?php

namespace Autopilot;

use CzProject\GitPhp\Git;
use Symfony\Component\Filesystem\Filesystem;

class Repository
{
    /** @var string  */
    private $repoUrl;
    /** @var Directory */
    private $directory;

    public function __construct(
        string $repoUrl,
        string $directory = __DIR__ . '/../storage/repository'
    ) {
        $this->repoUrl = $repoUrl;
        $this->directory = new Directory($directory);
    }

    public function clone(): void
    {
        $this->directory->deleteIfExists();

        (new Git())->cloneRepository($this->repoUrl, $this->directory->getPath());
    }

    public function dir()
    {
        return $this->directory;
    }
}
