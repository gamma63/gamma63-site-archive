<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['pass']);

    if (empty($login) || empty($pass)) {
        echo "All fields are required!";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT pass FROM `users` WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_pass);
            $stmt->fetch();

            // Verify the password
            if (password_verify($pass, $hashed_pass)) {
                // Password is correct, proceed with login
                echo "Welcome " . htmlspecialchars($login) . "!";
                // You can set session variables here for logged-in users
                header("Location: ../index.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        $stmt->close();
    }
}
?>

<head>
    <title>Login</title>
</head>

<style>
    h1, h2, h3, h4, p, a {
        color: white;
    }
</style>

<center>
<h1>Login to Gamma ID</h1>
<form action="" method="post">
    <input type="text" placeholder="Login" name="login" required><br>
    <br>
    <input type="password" placeholder="Password" name="pass" required><br>
    <br>
    <br>
    <button type="submit">Login</button>
</form>	
</center>
