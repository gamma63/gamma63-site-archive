<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $r_pass = htmlspecialchars(trim($_POST['r_pass']));

    if (empty($login) || empty($pass) || empty($r_pass)) {
        echo "<p>All fields are required!</p>";
    } else {
        if ($pass != $r_pass) {
            echo "<p>Passwords don't match!</p>";
        } else {
            // Check if the user already exists
            $stmt = $conn->prepare("SELECT login FROM `users` WHERE login = ?");
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "<p>Username already exists!</p>";
            } else {
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO `users` (login, pass) VALUES (?, ?)");
                $stmt->bind_param("ss", $login, $hashed_pass);

                if ($stmt->execute()) {
                    echo "<p>Success, you are going to be redirected in a moment...</p>";
                    header("Location: profile.php");
                    exit();
                } else {
                    echo "<p>Unknown error occurred.</p>";
                }
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gamma ID Registration</title>
    <style>
        h1, h2, h3, h4, p, a {
            color: white;
        }
    </style>
</head>
<body>
<center>
<h1>Register Gamma ID</h1>          
<form action="" method="post">
    <input type="text" placeholder="Login" name="login" required><br><br>
    <input type="password" placeholder="Password" name="pass" required><br><br>
    <input type="password" placeholder="Confirm Password" name="r_pass" required><br><br>
    <button type="submit">Register</button>
</form>	
</center>
</body>
</html>
