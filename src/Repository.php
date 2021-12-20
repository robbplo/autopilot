<?php

namespace Autopilot;

class Repository
{
    private $repoUrl;

    public function __construct(string $repoUrl)
    {
        $this->repoUrl = $repoUrl;
    }

    public function clone()
    {
        // @allow user to choose where projects are cloned
    }
}
