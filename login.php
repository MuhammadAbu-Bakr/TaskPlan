<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="png" href="assets/Logo.png" >
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

<?php session_start(); ?>

<div class="card shadow-sm" style="width: 100%; max-width: 400px;">
    <div class="card-body p-4">

        <h3 class="text-center mb-4">Login</h3>

        <form method="POST" action="auth.php">
            <div class="mb-3">
                <input name="username" type="text" class="form-control" placeholder="Username" required>
            </div>

            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3 mb-0">
            Not registered?
            <a href="register.php" class="text-decoration-none">Register Now</a>
        </p>

    </div>
</div>

</body>
</html>
