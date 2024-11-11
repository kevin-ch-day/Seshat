 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

$query = "SELECT rock_id, rock_name, description, status, start_date, end_date FROM rocks";
$result = $conn->query($query);
?>

<div class="container">
    <h2>Rock List</h2>
    <a href="create.php" class="button">Add New Rock</a>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Rock Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Target Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['rock_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['target_date']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['rock_id']; ?>">Edit</a>
                            <a href="../../controllers/RockController.php?action=delete&id=<?php echo $row['rock_id']; ?>" onclick="return confirm('Are you sure you want to delete this rock?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No rocks found.</p>
    <?php endif; ?>
</div>

<?php include_once '../includes/footer.php'; ?>
