<div class="container form-container">
  <div class="card auth-card">
    <h2>Login to TaskMaster</h2>
    <p>Enter your credentials to access your task dashboard.</p>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="/login" class="task-form">
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="user@example.com">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="••••••••">
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
    </form>
  </div>
</div>
