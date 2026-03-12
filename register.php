<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="assets/Logo.png" >
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $file = "data/users.txt";
    $users = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];

    foreach ($users as $user) {
        list($u, $p) = explode("|", $user);
        if ($u === $username) {
            die("<div class='alert alert-danger text-center'>Username already exists. <a href='register.php' class='alert-link'>Try Again</a></div>");
        }
    }

    file_put_contents($file, "$username|$password\n", FILE_APPEND);
    file_put_contents("data/tasks/$username.txt", "");

    echo "<div class='alert alert-success text-center'>Registration successful. <a href='login.php' class='alert-link'>Login here</a></div>";
    exit;
}
?>

<div class="card shadow-sm" style="width:100%; max-width:400px;">
    <div class="card-body p-4">

        <h3 class="text-center mb-4">Register</h3>

        <form method="POST">
            <div class="mb-3">
                <input name="username" type="text" class="form-control" placeholder="Username" required>
            </div>

            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Create Account</button>
        </form>

        <p class="text-center mt-3 mb-0">
            Already have an account?
            <a href="login.php" class="text-decoration-none">Login</a>
        </p>

    </div>
</div>

</body>
</html>
