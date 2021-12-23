<?php

namespace Autopilot\Tasks\Laravel;

class GenerateAppKey extends ArtisanTask
{
    public function message(): string
    {
        return 'Generating application key';
    }

    public function run()
    {
        passthru($this->artisan("key:generate"));
    }
}
