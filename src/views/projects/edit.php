<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

// Check if project ID is provided
if (isset($_GET['id'])) {
    $project_id = $_GET['id'];

    // Fetch project details
    $query = "SELECT * FROM projects WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();
}

if ($project):
?>

<div class="container">
    <h2>Edit Project</h2>
    <form action="../../controllers/ProjectController.php" method="POST">
        <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">

        <label for="project_name">Project Name:</label>
        <input type="text" id="project_name" name="project_name" value="<?php echo $project['project_name']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $project['description']; ?></textarea>

        <label for="project_type">Project Type:</label>
        <select id="project_type" name="project_type">
            <option value="Capstone" <?php if($project['project_type'] == 'Capstone') echo 'selected'; ?>>Capstone</option>
            <option value="Research" <?php if($project['project_type'] == 'Research') echo 'selected'; ?>>Research</option>
            <option value="Coursework" <?php if($project['project_type'] == 'Coursework') echo 'selected'; ?>>Coursework</option>
            <option value="Programming Project" <?php if($project['project_type'] == 'Programming Project') echo 'selected'; ?>>Programming Project</option>
            <option value="Data Analysis" <?php if($project['project_type'] == 'Data Analysis') echo 'selected'; ?>>Data Analysis</option>
            <option value="System Design" <?php if($project['project_type'] == 'System Design') echo 'selected'; ?>>System Design</option>
            <option value="Special Project" <?php if($project['project_type'] == 'Special Project') echo 'selected'; ?>>Special Project</option>
            <option value="Other" <?php if($project['project_type'] == 'Other') echo 'selected'; ?>>Other</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Planning" <?php if($project['status'] == 'Planning') echo 'selected'; ?>>Planning</option>
            <option value="In Progress" <?php if($project['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Review" <?php if($project['status'] == 'Review') echo 'selected'; ?>>Review</option>
            <option value="On Hold" <?php if($project['status'] == 'On Hold') echo 'selected'; ?>>On Hold</option>
            <option value="Completed" <?php if($project['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
            <option value="Archived" <?php if($project['status'] == 'Archived') echo 'selected'; ?>>Archived</option>
        </select>

        <button type="submit" name="action" value="update">Update Project</button>
    </form>
</div>

<?php else: ?>
    <p>Project not found.</p>
<?php endif; ?>

<?php include_once '../includes/footer.php'; ?>
