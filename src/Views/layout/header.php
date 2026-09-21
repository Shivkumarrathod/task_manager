<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Task Manager (MVC)</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <header class="navbar">
    <div class="nav-container">
      <a href="/" class="brand-logo">Task<span>Master</span></a>
      <nav class="nav-links">
        <a href="/">Home</a>
        <a href="/tasks">Tasks</a>
        <?php if (!empty($_SESSION['user'])): ?>
          <span class="user-badge">Hi, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
          <a href="/logout" class="nav-btn nav-btn-outline">Logout</a>
        <?php else: ?>
          <a href="/login" class="nav-btn">Login</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>
  <main class="main-content">
