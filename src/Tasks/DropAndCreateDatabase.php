<?php

namespace Autopilot\Tasks;

class DropAndCreateDatabase extends Task
{
    // @todo move to config
    public const DBNAME = 'autopilot';

    public function run()
    {
        $db = self::DBNAME;
        $this->output()->writeln("Dropping and creating database '{$db}'");

        // @todo this seems really unsafe :) maybe replace with proper sql client
        exec(sprintf(
            'mysql -q --user=bit_academy --password=bit_academy -e "drop database if exists %s; create database %s" > /dev/null 2>&1',
            $db,
            $db,
        ));
    }
}
