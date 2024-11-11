<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

$query = "SELECT scorecard_id, project_id, metric_name, metric_value, target_value, status, review_date FROM scorecards";
$result = $conn->query($query);
?>

<div class="container">
    <h2>Scorecard List</h2>
    <a href="create.php" class="button">Add New Scorecard</a>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Metric Name</th>
                    <th>Metric Value</th>
                    <th>Target Value</th>
                    <th>Status</th>
                    <th>Review Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['project_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['metric_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['metric_value']); ?></td>
                        <td><?php echo htmlspecialchars($row['target_value']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['review_date']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['scorecard_id']; ?>">Edit</a>
                            <a href="../../controllers/ScorecardController.php?action=delete&id=<?php echo $row['scorecard_id']; ?>" onclick="return confirm('Are you sure you want to delete this scorecard?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No scorecards found.</p>
    <?php endif; ?>
</div>

<?php include_once '../includes/footer.php'; ?>
