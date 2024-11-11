 
<?php
include_once '../../database/db_connect.php';
include_once '../includes/header.php';

if (isset($_GET['id'])) {
    $rock_id = $_GET['id'];
    $query = "SELECT * FROM rocks WHERE rock_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $rock_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rock = $result->fetch_assoc();
}

if ($rock):
?>

<div class="container">
    <h2>Edit Rock</h2>
    <form action="../../controllers/RockController.php" method="POST">
        <input type="hidden" name="rock_id" value="<?php echo $rock['rock_id']; ?>">

        <label for="rock_name">Rock Name:</label>
        <input type="text" id="rock_name" name="rock_name" value="<?php echo $rock['rock_name']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $rock['description']; ?></textarea>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Not Started" <?php if($rock['status'] == 'Not Started') echo 'selected'; ?>>Not Started</option>
            <option value="In Progress" <?php if($rock['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if($rock['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select>

        <label for="target_date">Target Date:</label>
        <input type="date" id="target_date" name="target_date" value="<?php echo $rock['target_date']; ?>" required>

        <button type="submit" name="action" value="update">Update Rock</button>
    </form>
</div>

<?php else: ?>
    <p>Rock not found.</p>
<?php endif; ?>

<?php include_once '../includes/footer.php'; ?>
