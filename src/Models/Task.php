<?php

namespace App\Models;

class Task
{
    public static function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['tasks'])) {
            // Seed sample tasks for initial display
            $_SESSION['tasks'] = [
                [
                    'id' => 1,
                    'title' => 'Set up Azure App Service',
                    'description' => 'Deploy PHP application with custom Nginx startup command.',
                    'priority' => 'High',
                    'status' => 'Completed',
                    'created_at' => date('Y-m-d H:i')
                ],
                [
                    'id' => 2,
                    'title' => 'Implement MVC Architecture',
                    'description' => 'Structure project into Models, Views, and Controllers.',
                    'priority' => 'High',
                    'status' => 'In Progress',
                    'created_at' => date('Y-m-d H:i')
                ],
                [
                    'id' => 3,
                    'title' => 'Connect MySQL Database',
                    'description' => 'Integrate Azure Database for MySQL Flexible Server.',
                    'priority' => 'Medium',
                    'status' => 'Pending',
                    'created_at' => date('Y-m-d H:i')
                ]
            ];
        }
    }

    public static function all(): array
    {
        self::initSession();
        return $_SESSION['tasks'] ?? [];
    }

    public static function find(int $id): ?array
    {
        self::initSession();
        foreach ($_SESSION['tasks'] as $task) {
            if ($task['id'] === $id) {
                return $task;
            }
        }
        return null;
    }

    public static function create(array $data): void
    {
        self::initSession();
        $tasks = $_SESSION['tasks'];
        $nextId = empty($tasks) ? 1 : max(array_column($tasks, 'id')) + 1;

        $tasks[] = [
            'id' => $nextId,
            'title' => htmlspecialchars(trim($data['title'] ?? '')),
            'description' => htmlspecialchars(trim($data['description'] ?? '')),
            'priority' => htmlspecialchars($data['priority'] ?? 'Medium'),
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i')
        ];

        $_SESSION['tasks'] = $tasks;
    }

    public static function toggleStatus(int $id): void
    {
        self::initSession();
        foreach ($_SESSION['tasks'] as &$task) {
            if ($task['id'] === $id) {
                $task['status'] = ($task['status'] === 'Completed') ? 'Pending' : 'Completed';
                break;
            }
        }
    }

    public static function delete(int $id): void
    {
        self::initSession();
        $_SESSION['tasks'] = array_values(array_filter(
            $_SESSION['tasks'],
            fn($task) => $task['id'] !== $id
        ));
    }
}
