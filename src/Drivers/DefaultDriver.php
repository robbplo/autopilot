<?php

namespace Autopilot\Drivers;

class DefaultDriver extends Driver
{
    public function matches(): bool
    {
        return true;
    }

    public function setUp(): Driver
    {
        return $this;
    }

    public function serve(): Driver
    {
        return $this;
    }
}
