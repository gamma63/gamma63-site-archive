<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);
    $r_pass = htmlspecialchars($_POST['r_pass']);

    if (empty($login) || empty($pass) || empty($r_pass)) {
        echo "All fields are required!";
    } else {
        if ($pass != $r_pass) {
            echo "Passwords don't match!";
        } else {
            // Hash the password before storing it
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO `users` (login, pass) VALUES (?, ?)");
            $stmt->bind_param("ss", $login, $hashed_pass);

            if ($stmt->execute()) {
                echo "Success, you are going to be redirected in a moment...";
                header("Location: ../index.php");
                die();
            } else {
                echo "Unknown error";
            }

            $stmt->close();
        }
    }
}
?>

<head>
    <title>Gamma ID registration</title>
</head>

<style>
    h1, h2, h3, h4, p, a {
        color: white;
    }
</style>

<center>
<h1>Register Gamma ID</h1>          
<form action="" method="post">
    <input type="text" placeholder="Login" name="login" required><br>
    <br>
    <input type="password" placeholder="Password" name="pass" required><br>
    <br>
    <input type="password" placeholder="Confirm Password" name="r_pass" required><br>
    <br>
    <br>
    <button type="submit">Register</button>
</form>	
</center>
