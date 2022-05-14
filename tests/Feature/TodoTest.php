<?php

namespace Tests\Feature;

use App\Models\Todo;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /** @test */
    public function it_can_get_all_todos()
    {
        Todo::factory(2)->create();

        $response = $this->getJson(route('todo.index'));

        $response->assertOk();
    }

    /** @test */
    public function it_can_create_todo()
    {
        $payload = [
            'title' => 'new todo'
        ];

        $response = $this->postJson(route('todo.create'), $payload);

        $response->assertCreated();
        $this->assertDatabaseCount('todos', 1);
    }

    /** @test */
    public function it_can_update_todo()
    {
        $todo = Todo::factory()->create();
        $payload = [
            'title' => $todo->title
        ];

        $response = $this->putJson(route('todo.update',$todo->id ), $payload);

        $response->assertOk();
        $this->assertDatabaseHas('todos', [
            'title' => $payload['title']
        ]);
    }

    /** @test */
    public function it_can_delete_todo()
    {
        $todo = Todo::factory()->create();

        $response2 = $this->deleteJson(route('todo.delete',$todo->id ));

        $response2->assertOk();
        $this->assertDatabaseCount('todos' , 0);
    }


}
