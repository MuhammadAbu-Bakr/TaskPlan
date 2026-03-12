<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Failed</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="png" href="assets/Logo.png" >
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

<?php
    session_start();
    $file ="data/users.txt";

    $username = $_POST['username'] ??'';
    $password = $_POST['password'] ??'';

    $users =file_exists($file) ? file($file,FILE_IGNORE_NEW_LINES) : [];
    $logged_in=false;
    foreach ($users as $user) {
            list($u,$p) =explode("|",$user);

            if ($u === $username && $p === $password) {
                $_SESSION['user' ] =$username;
                $logged_in=true;
                header("location: index.php");
                exit;
            }
        }
if (!$logged_in) {
    echo "
    <div class='card shadow-sm' style='max-width:400px; width:100%;'>
        <div class='card-body text-center'>
            <div class='alert alert-danger mb-3'>
                Invalid login Try Again
            </div>
            <a href='login.php' class='btn btn-primary w-100'>Try Again</a>
        </div>
    </div>
    ";
}
?>

</body>
</html>
