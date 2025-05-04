<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Container\Attributes\Tag;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_employer(): void
    {
        // Arrange
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id,
        ]);

        // Act & Assert
        $this->assertInstanceOf(Employer::class, $job->user);
        $this->assertEquals($employer->id, $job->user->id);
    }

    public function test_can_has_tag(): void
    {
        $job = Job::factory()->create();

        $job->tag('Frontend');

        $this->assertCount(1, $job->tags);
        $this->assertEquals('Frontend', $job->tags()->first()->name);
        $this->assertInstanceOf(Tag::class, $job->tags()->first());
    }
}
