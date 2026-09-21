<?php

$page = $_GET['page'] ?? 'home';

if ($page === 'login') {
    require_once __DIR__ . '/../src/views/login.php';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager</title>
</head>
<body>
  <h1>Hello World!</h1>
  <button onclick="navigateToLoginPage()">Click Me</button>

  <script>
    function navigateToLoginPage() {
      window.location.href = '?page=login';
    }
  </script>
</body>
</html>
