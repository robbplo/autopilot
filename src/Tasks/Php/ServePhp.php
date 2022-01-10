<?php

namespace Autopilot\Tasks\Php;

use Autopilot\Tasks\Task;

class ServePhp extends Task
{
    // @todo guess primary file
    public function run()
    {
        $url = "localhost:8000";
        exec("python -m webbrowser http://$url");
        passthru("php -S {$url}");
    }

    public function message(): string
    {
        return "Starting PHP web server";
    }
}
