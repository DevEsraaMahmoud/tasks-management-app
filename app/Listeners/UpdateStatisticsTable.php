<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Models\Statistics;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStatisticsTable
{
    public function handle(TaskCreated $event)
    {
        // Increment the task count for the assigned user in the Statistics table
        $userId = $event->task->assigned_to_id;
        Statistics::updateOrCreate(
            ['user_id' => $userId],
            ['task_count' => Statistics::where('user_id', $userId)->count() + 1]
        );
    }
}
