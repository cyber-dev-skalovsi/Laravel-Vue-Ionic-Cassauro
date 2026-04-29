<?php

namespace Tests\Unit;

use App\Models\Todo;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class TodoTest extends TestCase
{
    // Unit Test: model logic in isolation (no DB)
    public function test_todo_can_be_marked_as_complete(): void
    {
        $todo = new Todo();
        $todo->completed = false;
        $todo->markAsComplete();

        $this->assertTrue($todo->isComplete());
    }

    public function test_todo_is_not_complete_by_default(): void
    {
        $todo = new Todo();
        $todo->completed = false;

        $this->assertFalse($todo->isComplete());
    }

    // Mocking: mock a Todo and verify method is called
    public function test_mock_mark_as_complete_is_called(): void
    {
        /** @var Todo|MockObject $mock */
        $mock = $this->createMock(Todo::class);

        $mock->expects($this->once())
             ->method('markAsComplete');

        $mock->markAsComplete();
    }
}