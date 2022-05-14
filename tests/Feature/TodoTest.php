<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /** @test */
    public function it_create_todo()
    {
        $payload = [
            'title' => 'new todo'
        ];

        $response = $this->postJson(route('todo.index'), $payload);

        $response->assertStatus(200);
    }
}
