 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

// Check if task ID is provided
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Fetch task details
    $query = "SELECT * FROM tasks WHERE task_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = $result->fetch_assoc();
}

if ($task):
?>

<div class="container">
    <h2>Edit Task</h2>
    <form action="../../controllers/TaskController.php" method="POST">
        <input type="hidden" name="task_id" value="<?php echo $task['task_id']; ?>">

        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?php echo $task['task_name']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $task['description']; ?></textarea>

        <label for="priority">Priority Level:</label>
        <select id="priority" name="priority">
            <option value="Low" <?php if($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
            <option value="Medium" <?php if($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="High" <?php if($task['priority'] == 'High') echo 'selected'; ?>>High</option>
            <option value="Critical" <?php if($task['priority'] == 'Critical') echo 'selected'; ?>>Critical</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pending" <?php if($task['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="In Progress" <?php if($task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if($task['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" value="<?php echo $task['due_date']; ?>" required>

        <button type="submit" name="action" value="update">Update Task</button>
    </form>
</div>

<?php else: ?>
    <p>Task not found.</p>
<?php endif; ?>

<?php include_once '../includes/footer.php'; ?>
