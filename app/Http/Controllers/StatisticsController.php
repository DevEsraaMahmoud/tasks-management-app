<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $topUsers = User::has('tasks')
            ->withCount('tasks')
            ->orderByDesc('tasks_count')
            ->limit(10)
            ->get();

        return view('tasks.statistics', compact('topUsers'));
    }
}
