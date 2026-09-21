<div class="container form-container">
  <div class="card">
    <h2>Create New Task</h2>
    <p>Fill in the details below to add a new task.</p>

    <form method="POST" action="/tasks/store" class="task-form">
      <div class="form-group">
        <label for="title">Task Title *</label>
        <input type="text" id="title" name="title" required placeholder="e.g. Design Database Schema">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Add task details or instructions..."></textarea>
      </div>

      <div class="form-group">
        <label for="priority">Priority</label>
        <select id="priority" name="priority">
          <option value="Low">Low</option>
          <option value="Medium" selected>Medium</option>
          <option value="High">High</option>
        </select>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Task</button>
        <a href="/tasks" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
