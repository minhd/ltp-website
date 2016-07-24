<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use LTP\Project;
use LTP\User;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    public function test_project_creation()
    {
        $project = factory(Project::class)->create();
        $user = $project->creator()->get()->first();
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_user_participate_in_a_project()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->create();

        $user->participate($project);

        $this->assertContains($user->id, $project->contributors()->get()->pluck('pivot')->pluck('user_id')->all());
    }
}