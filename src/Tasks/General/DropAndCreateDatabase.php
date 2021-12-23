<?php

namespace Autopilot\Tasks\General;

use Autopilot\Tasks\Task;

class DropAndCreateDatabase extends Task
{
    // @todo move to config
    public const DBNAME = 'autopilot';

    public function message(): string
    {
        return "Dropping and creating database '" . (self::DBNAME) . "'";
    }

    public function run()
    {
        // @todo this seems really unsafe :) maybe replace with proper sql client
        exec(sprintf(
            'mysql -q --user=bit_academy --password=bit_academy -e "drop database if exists %s; create database %s" > /dev/null 2>&1',
            self::DBNAME,
            self::DBNAME,
        ));
    }
}
