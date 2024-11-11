<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';
?>

<div class="container">
    <h2>Create New Scorecard</h2>
    <form action="../../controllers/ScorecardController.php" method="POST">
        <label for="project_id">Project ID:</label>
        <input type="number" id="project_id" name="project_id" required>

        <label for="metric_name">Metric Name:</label>
        <input type="text" id="metric_name" name="metric_name" required>

        <label for="metric_value">Metric Value:</label>
        <input type="number" step="0.01" id="metric_value" name="metric_value">

        <label for="target_value">Target Value:</label>
        <input type="number" step="0.01" id="target_value" name="target_value" required>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="On Track">On Track</option>
            <option value="Off Track">Off Track</option>
        </select>

        <label for="review_date">Review Date:</label>
        <input type="date" id="review_date" name="review_date">

        <button type="submit" name="action" value="create">Create Scorecard</button>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>
