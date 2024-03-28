<?php

namespace App\Jobs;

use App\Models\Statistics;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $signature = 'statistics:update';
    protected $description = 'Update statistics table with top users tasks count';

    public function handle(): void
    {
        $topUsers = User::has('tasks')
            ->withCount('tasks')
            ->orderByDesc('tasks_count')
            ->limit(10)
            ->get();

        foreach ($topUsers as $user) {
            Statistics::updateOrCreate(
                ['user_id' => $user->id],
                ['task_count' => $user->task_count]
            );
        }
    }
}
