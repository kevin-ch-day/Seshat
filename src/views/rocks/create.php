 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';
?>

<div class="container">
    <h2>Create New Rock</h2>
    <form action="../../controllers/RockController.php" method="POST">
        <label for="rock_name">Rock Name:</label>
        <input type="text" id="rock_name" name="rock_name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <label for="target_date">Target Date:</label>
        <input type="date" id="target_date" name="target_date" required>

        <button type="submit" name="action" value="create">Create Rock</button>
    </form>
</div>

<?php include_once '../includes/footer.php'; ?>
