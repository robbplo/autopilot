<?php

namespace Autopilot\Tasks\Laravel;

class MigrateAndSeed extends ArtisanTask
{
    public function run()
    {
        $this->output()->writeln('Migrating and seeding database');

        exec($this->artisan("migrate --seed"));
    }
}
