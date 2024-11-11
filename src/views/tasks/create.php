 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';
?>

<div class="container">
    <h2>Create New Task</h2>
    <form action="../../controllers/TaskController.php" method="POST">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="priority">Priority Level:</label>
        <select id="priority" name="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" required>

        <button type="submit" name="action" value="create">Create Task</button>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>
