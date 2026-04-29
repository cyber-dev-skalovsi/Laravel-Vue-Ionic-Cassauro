<?php

namespace Tests\Feature;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoApiTest extends TestCase
{
    use RefreshDatabase;

    // TDD: written before full implementation
    public function test_can_fetch_all_todos(): void
    {
        Todo::create(['title' => 'Buy milk', 'completed' => false]);
        Todo::create(['title' => 'Do laundry', 'completed' => false]);

        $response = $this->getJson('/api/todos');

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_can_create_a_todo(): void
    {
        $response = $this->postJson('/api/todos', ['title' => 'Learn TDD']);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Learn TDD', 'completed' => false]);

        $this->assertDatabaseHas('todos', ['title' => 'Learn TDD']);
    }

    public function test_cannot_create_todo_without_title(): void
    {
        $response = $this->postJson('/api/todos', []);

        $response->assertStatus(422);
    }

    public function test_can_update_a_todo(): void
    {
        $todo = Todo::create(['title' => 'Old title', 'completed' => false]);

        $response = $this->putJson("/api/todos/{$todo->id}", [
            'title' => 'New title',
            'completed' => true,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'New title', 'completed' => true]);
    }

    public function test_can_delete_a_todo(): void
    {
        $todo = Todo::create(['title' => 'Delete me', 'completed' => false]);

        $response = $this->deleteJson("/api/todos/{$todo->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }
}