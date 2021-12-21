<?php

namespace Autopilot\Tasks\Laravel;

class GenerateAppKey extends ArtisanTask
{
    public function run()
    {
        $this->output()->writeln('Generating application key');
        passthru($this->artisan("key:generate"));
    }
}
