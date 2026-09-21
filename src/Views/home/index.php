<div class="container">
  <div class="hero">
    <h1>Welcome to PHP Task Manager</h1>
    <p>A clean MVC (Model-View-Controller) web application deployed to Azure App Service.</p>
    <div class="hero-actions">
      <a href="/tasks" class="btn btn-primary">View All Tasks</a>
      <a href="/tasks/create" class="btn btn-secondary">+ Add New Task</a>
    </div>
  </div>

  <div class="stats-grid">
    <div class="stat-card">
      <span class="stat-number"><?= $total ?></span>
      <span class="stat-label">Total Tasks</span>
    </div>
    <div class="stat-card stat-pending">
      <span class="stat-number"><?= $pending ?></span>
      <span class="stat-label">Pending</span>
    </div>
    <div class="stat-card stat-completed">
      <span class="stat-number"><?= $completed ?></span>
      <span class="stat-label">Completed</span>
    </div>
  </div>

  <?php if (!empty($recentTasks)): ?>
    <div class="recent-section">
      <h2>Recent Tasks</h2>
      <div class="task-list">
        <?php foreach ($recentTasks as $task): ?>
          <div class="task-card <?= $task['status'] === 'Completed' ? 'completed' : '' ?>">
            <div class="task-info">
              <h3><?= $task['title'] ?></h3>
              <p><?= $task['description'] ?></p>
              <span class="badge badge-<?= strtolower($task['priority']) ?>"><?= $task['priority'] ?> Priority</span>
            </div>
            <div class="task-status">
              <span class="status-pill status-<?= strtolower(str_replace(' ', '-', $task['status'])) ?>">
                <?= $task['status'] ?>
              </span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</div>
