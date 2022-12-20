<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function 一覧を取得()
    {
        $tasks = Task::factory()->count(10)->create();
        // dd($tasks->toArray());

        $response = $this->getJson('api/tasks');

        $response
            ->assertOk()
            ->assertJsonCount($tasks->count(10));
    }
}
