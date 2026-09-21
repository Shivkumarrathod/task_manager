<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class HomeController extends Controller
{
    public function index(): void
    {
        $tasks = Task::all();
        $total = count($tasks);
        $completed = count(array_filter($tasks, fn($t) => $t['status'] === 'Completed'));
        $pending = $total - $completed;

        $this->render('home/index', [
            'total' => $total,
            'completed' => $completed,
            'pending' => $pending,
            'recentTasks' => array_slice(array_reverse($tasks), 0, 3)
        ]);
    }
}
