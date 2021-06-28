<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    
    use RefreshDatabase;
    /** @test */

    public function it_has_a_path()
    {
        $project = factory('App\Models\Project')->create();
        $this->assertEquals('/project/' . $project->id , $project->path());
        
    }
}
