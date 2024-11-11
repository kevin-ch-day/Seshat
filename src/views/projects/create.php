 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';
?>

<div class="container">
    <h2>Create New Project</h2>
    <form action="../../controllers/ProjectController.php" method="POST">
        <label for="project_name">Project Name:</label>
        <input type="text" id="project_name" name="project_name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="project_type">Project Type:</label>
        <select id="project_type" name="project_type">
            <option value="Capstone">Capstone</option>
            <option value="Research">Research</option>
            <option value="Coursework">Coursework</option>
            <option value="Programming Project">Programming Project</option>
            <option value="Data Analysis">Data Analysis</option>
            <option value="System Design">System Design</option>
            <option value="Special Project">Special Project</option>
            <option value="Other">Other</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Planning">Planning</option>
            <option value="In Progress">In Progress</option>
            <option value="Review">Review</option>
            <option value="On Hold">On Hold</option>
            <option value="Completed">Completed</option>
            <option value="Archived">Archived</option>
        </select>

        <button type="submit" name="action" value="create">Create Project</button>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>
