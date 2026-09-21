<div class="container">
  <div class="page-header">
    <div>
      <h2>Task Management</h2>
      <p>Organize, track, and complete your tasks</p>
    </div>
    <a href="/tasks/create" class="btn btn-primary">+ Create Task</a>
  </div>

  <?php if (empty($tasks)): ?>
    <div class="empty-state">
      <h3>No tasks found</h3>
      <p>Get started by creating your first task.</p>
      <a href="/tasks/create" class="btn btn-primary">+ Add Task</a>
    </div>
  <?php else: ?>
    <div class="task-grid">
      <?php foreach ($tasks as $task): ?>
        <div class="task-card <?= $task['status'] === 'Completed' ? 'completed' : '' ?>">
          <div class="task-header">
            <span class="badge badge-<?= strtolower($task['priority']) ?>"><?= $task['priority'] ?> Priority</span>
            <span class="status-pill status-<?= strtolower(str_replace(' ', '-', $task['status'])) ?>">
              <?= $task['status'] ?>
            </span>
          </div>

          <h3 class="task-title"><?= $task['title'] ?></h3>
          <p class="task-desc"><?= $task['description'] ?></p>
          <small class="task-date">Added: <?= $task['created_at'] ?></small>

          <div class="task-actions">
            <form method="POST" action="/tasks/toggle" style="display:inline;">
              <input type="hidden" name="id" value="<?= $task['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline">
                <?= $task['status'] === 'Completed' ? '↩ Reopen' : '✓ Complete' ?>
              </button>
            </form>

            <form method="POST" action="/tasks/delete" style="display:inline;" onsubmit="return confirm('Delete this task?');">
              <input type="hidden" name="id" value="<?= $task['id'] ?>">
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
