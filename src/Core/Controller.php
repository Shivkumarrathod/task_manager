<?php

namespace App\Core;

class Controller
{
    /**
     * Render a view within standard layout
     */
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        
        if (!file_exists($viewFile)) {
            http_response_code(404);
            echo "View [{$view}] not found.";
            return;
        }

        require_once __DIR__ . '/../Views/layout/header.php';
        require_once $viewFile;
        require_once __DIR__ . '/../Views/layout/footer.php';
    }

    /**
     * Redirect to a specific route/URL
     */
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}
