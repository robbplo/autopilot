<?php

namespace Tests;

use Tests\Utils\ProjectsDirectory;

class TestCase extends \PHPUnit\Framework\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        ProjectsDirectory::clear();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        ProjectsDirectory::clear();
    }


}
