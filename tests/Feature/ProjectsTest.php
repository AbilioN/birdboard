<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {

        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->title,
            'description' => $this->faker->sentence
        ];

        $this->post('/projects',$attributes);
        $this->assertDatabaseHas('projects',$attributes);

        $this->get('/projects')->assertSee($attributes['title']);
        // $this->get('/projects')->assertSee($attributes['description']);


    }
    
    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects',$attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {

        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects',$attributes)->assertSessionHasErrors('description');
    }
}
