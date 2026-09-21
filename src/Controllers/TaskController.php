<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(): void
    {
        $tasks = Task::all();
        $this->render('tasks/index', [
            'tasks' => $tasks
        ]);
    }

    public function create(): void
    {
        $this->render('tasks/create');
    }

    public function store(): void
    {
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $priority = $_POST['priority'] ?? 'Medium';

        if (!empty($title)) {
            Task::create([
                'title' => $title,
                'description' => $description,
                'priority' => $priority
            ]);
        }

        $this->redirect('/tasks');
    }

    public function toggle(): void
    {
        $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
        if ($id > 0) {
            Task::toggleStatus($id);
        }

        $this->redirect('/tasks');
    }

    public function delete(): void
    {
        $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
        if ($id > 0) {
            Task::delete($id);
        }

        $this->redirect('/tasks');
    }
}
