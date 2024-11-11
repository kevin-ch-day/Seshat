 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

// Fetch all tasks
$query = "SELECT task_id, task_name, description, priority, status, due_date FROM tasks";
$result = $conn->query($query);
?>

<div class="container">
    <h2>Task List</h2>
    <a href="create.php" class="button">Add New Task</a>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['task_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['priority']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['task_id']; ?>">Edit</a>
                            <a href="../../controllers/TaskController.php?action=delete&id=<?php echo $row['task_id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tasks found.</p>
    <?php endif; ?>
</div>

<?php include_once '../includes/footer.php'; ?>
