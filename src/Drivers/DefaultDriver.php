<?php

namespace Autopilot\Drivers;

class DefaultDriver extends Driver
{
    public function matches(): bool
    {
        return true;
    }
}
