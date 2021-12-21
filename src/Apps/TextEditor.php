<?php

namespace Autopilot\Apps;

class TextEditor
{
    private $executable;

    public function __construct(string $executable)
    {
        $this->executable = $executable;
    }

    public function open(string $directory)
    {
        exec("$this->executable $directory");
    }
}
