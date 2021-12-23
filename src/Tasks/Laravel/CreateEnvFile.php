<?php

namespace Autopilot\Tasks\Laravel;

use Autopilot\Tasks\General\DropAndCreateDatabase;
use Autopilot\Tasks\Task;

class CreateEnvFile extends Task
{
    public function message(): string
    {
        return 'Creating .env file';
    }

    public function run()
    {
        copy($this->repository()->dir()->getPath('.env.example'), $this->repository()->dir()->getPath('.env'));

        $this->replaceValues($this->repository()->dir()->getPath('.env'));
    }

    private function replaceValues(string $path): void
    {
        // @todo split into two tasks
        //$this->output()->writeln('Entering environment variables');

        $envFile = file_get_contents($path);
        $replace = [
            "DB_DATABASE" => DropAndCreateDatabase::DBNAME,
            "DB_USERNAME" => "bit_academy",
            "DB_PASSWORD" => "bit_academy",
        ];

        foreach ($replace as $key => $value) {
            $envFile = preg_replace("/$key=.*/", "$key=$value", $envFile);
        }

        file_put_contents($path, $envFile);
    }
}
