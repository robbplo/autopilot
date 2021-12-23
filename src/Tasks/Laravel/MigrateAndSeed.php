<?php

namespace Autopilot\Tasks\Laravel;

class MigrateAndSeed extends ArtisanTask
{
    public function message(): string
    {
        return 'Migrating and seeding database';
    }

    public function run()
    {
        exec($this->artisan("migrate --seed"));
    }
}
