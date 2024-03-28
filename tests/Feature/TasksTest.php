<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_all_tasks()
    {
        Task::factory()->count(5)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewHas('tasks');
    }

    public function test_it_stores_tasks()
    {
        $data = Task::factory()->make([
            'title' => 'Test Task Title'
        ])->toArray();

        $response = $this->post(route('tasks.store'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task Title']);
    }

    public function test_it_stores_tasks_with_assigned_user()
    {
        $user = User::factory()->create();
        $data = Task::factory()->make([
            'title' => 'Test2',
            'assigned_to_id' => $user->id,
        ])->toArray();

        $response = $this->post(route('tasks.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', ['title' => 'Test2']);

        $task = Task::where('title', 'Test2')->first();

        $this->assertEquals($user->id, $task->assigned_to_id);
    }

    public function test_it_prevents_assigning_tasks_to_nonexist_user()
    {
        $data = Task::factory()->make([
            'title' => 'Test3',
            'assigned_to_id' => 9999, // Assuming this user ID not exists
        ])->toArray();

        $response = $this->post(route('tasks.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('tasks', ['title' => 'Test3']);
    }
}
