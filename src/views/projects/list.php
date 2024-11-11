 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

// Fetch all projects
$query = "SELECT project_id, project_name, description, project_type, status FROM projects";
$result = $conn->query($query);
?>

<div class="container">
    <h2>Project List</h2>
    <a href="create.php" class="button">Add New Project</a>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['project_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['project_id']; ?>">Edit</a>
                            <a href="../../controllers/ProjectController.php?action=delete&id=<?php echo $row['project_id']; ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No projects found.</p>
    <?php endif; ?>
</div>

<?php include_once '../includes/footer.php'; ?>
