<?php

namespace Autopilot\Tasks\General;

use Autopilot\Tasks\Task;
use PDO;

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
        $pdo = new PDO(
            'mysql:host=localhost',
            'bit_academy',
            'bit_academy'
        );
        $pdo->exec('drop database if exists ' . self::DBNAME);
        $pdo->exec('create database ' . self::DBNAME);
    }
}
