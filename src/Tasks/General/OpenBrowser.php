<?php

namespace Autopilot\Tasks\General;

use Autopilot\Tasks\Task;

class OpenBrowser extends Task
{
    public function run()
    {
        exec("python -m webbrowser http://127.0.0.1:8000");
    }

    public function message(): string
    {
        return 'Opening browser';
    }
}
