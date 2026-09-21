<?php

declare(strict_types=1);

// Start session for state and mock storage
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Simple PSR-4 Autoloader for App\ namespace
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\TaskController;
use App\Controllers\AuthController;

// Initialize Router & Register Routes
$router = new Router();

// Home Routes
$router->get('/', [HomeController::class, 'index']);

// Task Routes
$router->get('/tasks', [TaskController::class, 'index']);
$router->get('/tasks/create', [TaskController::class, 'create']);
$router->post('/tasks/store', [TaskController::class, 'store']);
$router->post('/tasks/toggle', [TaskController::class, 'toggle']);
$router->post('/tasks/delete', [TaskController::class, 'delete']);

// Auth Routes
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/logout', [AuthController::class, 'logout']);

// Dispatch Request
$router->dispatch();
