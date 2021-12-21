<?php

namespace Tests;

use Autopilot\Repository;

class RepositoryTest extends TestCase
{

    /** @test */
    public function it_clones_github_repository_via_http()
    {
        $repository = new Repository("https://github.com/rtyley/small-test-repo");
        $repository->clone();

        $this->assertFileExists(__DIR__ . '/../storage/repository/EXAMPLE');
    }

    // @todo replace with test repository
    /** @test */
    public function it_clones_github_repository_via_ssh()
    {
        $repository = new Repository("git@bitlab.bit-academy.nl:803ce71e-0a33-11ec-a943-4213e7ee7fac/85651f04-0a5a-11ec-a943-4213e7ee7fac/Ben-je-boos-a6b8a963-2e2e6e37.git");
        $repository->clone();

        $this->assertFileExists(__DIR__ . '/../storage/repository/sentiment.php');
    }
}
