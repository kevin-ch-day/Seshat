<?php
// Start the session
session_start();

// Include the database connection and header
include_once 'database/db_connect.php';
include_once 'views/includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seshat Project Tracking Dashboard</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

<div class="container">
    <h1>Welcome to Seshat</h1>
    <p>Track and manage your capstone project and other MIS-related tasks with ease.</p>

    <!-- Navigation links -->
    <nav>
        <ul>
            <li><a href="views/projects/list.php">Projects</a></li>
            <li><a href="views/tasks/list.php">Tasks</a></li>
            <li><a href="views/rocks/list.php">Rocks</a></li>
            <li><a href="views/scorecards/list.php">Scorecards</a></li>
            <li><a href="views/includes/footer.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Main content area -->
    <div class="content">
        <section>
            <h2>Project Overview</h2>
            <p>Here, you can view and manage all your projects, track progress, and ensure that you’re staying on top of your goals.</p>
            <a href="Seshat/src/views/projects/create.php" class="button">Create New Project</a>
        </section>

        <section>
            <h2>Current Tasks</h2>
            <p>View and manage your tasks to keep your project milestones within reach.</p>
            <a href="Seshat/src/views/tasks/create.php" class="button">Add New Task</a>
        </section>
    </div>
</div>

<!-- Include the footer -->
<?php include_once 'views/includes/footer.php'; ?>

</body>
</html>
