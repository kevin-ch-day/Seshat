<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

if (isset($_GET['id'])) {
    $scorecard_id = $_GET['id'];
    $query = "SELECT * FROM scorecards WHERE scorecard_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $scorecard_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $scorecard = $result->fetch_assoc();
}

if ($scorecard):
?>

<div class="container">
    <h2>Edit Scorecard</h2>
    <form action="../../controllers/ScorecardController.php" method="POST">
        <input type="hidden" name="scorecard_id" value="<?php echo $scorecard['scorecard_id']; ?>">

        <label for="project_id">Project ID:</label>
        <input type="number" id="project_id" name="project_id" value="<?php echo $scorecard['project_id']; ?>" required>

        <label for="metric_name">Metric Name:</label>
        <input type="text" id="metric_name" name="metric_name" value="<?php echo $scorecard['metric_name']; ?>" required>

        <label for="metric_value">Metric Value:</label>
        <input type="number" step="0.01" id="metric_value" name="metric_value" value="<?php echo $scorecard['metric_value']; ?>">

        <label for="target_value">Target Value:</label>
        <input type="number" step="0.01" id="target_value" name="target_value" value="<?php echo $scorecard['target_value']; ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="On Track" <?php if($scorecard['status'] == 'On Track') echo 'selected'; ?>>On Track</option>
            <option value="Off Track" <?php if($scorecard['status'] == 'Off Track') echo 'selected'; ?>>Off Track</option>
        </select>

        <label for="review_date">Review Date:</label>
        <input type="date" id="review_date" name="review_date" value="<?php echo $scorecard['review_date']; ?>">

        <button type="submit" name="action" value="update">Update Scorecard</button>
    </form>
</div>

<?php else: ?>
    <p>Scorecard not found.</p>
<?php endif; ?>

<?php include_once '../includes/footer.php'; ?>
