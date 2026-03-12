<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="assets/Logo.png" >
</head>
<body class="bg-light">

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}

$user = $_SESSION['user'];
$task_file = "data/tasks/$user.txt";

//new tasks
if (isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if ($task !== "") {
        file_put_contents($task_file, $task . PHP_EOL, FILE_APPEND);
    }
}

//read tasks 
$tasks = file_exists($task_file) ? file($task_file, FILE_IGNORE_NEW_LINES) : [];
?>

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Welcome <?php echo htmlspecialchars($user); ?></h4>
                <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>

            <form method="POST" class="input-group mb-4">
                <input type="text" name="task" class="form-control" placeholder="Add new task" required>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

            <h5 class="mb-3">Your Tasks</h5>

            <?php if (count($tasks) > 0): ?>
                <ul class="list-group">
                    <?php foreach ($tasks as $t): ?>
                        <li class="list-group-item">
                            <?php echo htmlspecialchars($t); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="text-muted text-center py-3">
                    No tasks added yet
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
