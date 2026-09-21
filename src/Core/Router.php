<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        
        // Normalize URI
        $uri = rtrim($uri, '/');
        if ($uri === '' || $uri === '/index.php') {
            $uri = '/';
        }

        // Check if query parameter routing is used as fallback (e.g., ?page=tasks)
        if (isset($_GET['page'])) {
            $page = '/' . trim($_GET['page'], '/');
            if (isset($this->routes[$method][$page])) {
                $uri = $page;
            }
        }

        if (isset($this->routes[$method][$uri])) {
            [$controllerClass, $action] = $this->routes[$method][$uri];
            $controller = new $controllerClass();
            $controller->$action();
            return;
        }

        // 404 handler
        http_response_code(404);
        require_once __DIR__ . '/../Views/layout/header.php';
        echo '<div class="container error-page"><h2>404 - Page Not Found</h2><p>The page you requested does not exist.</p><a href="/" class="btn btn-primary">Go Home</a></div>';
        require_once __DIR__ . '/../Views/layout/footer.php';
    }
}
