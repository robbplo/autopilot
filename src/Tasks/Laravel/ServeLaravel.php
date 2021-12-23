<?php

namespace Autopilot\Tasks\Laravel;

class ServeLaravel extends ArtisanTask
{
    public function run()
    {
        passthru($this->artisan('serve'));

        return $this;
    }

    public function message(): string
    {
        return 'Serving application';
    }
}
