<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    if (empty($login) || empty($pass)) {
        echo "<p>All fields are required!</p>";
    } else {
        $stmt = $conn->prepare("SELECT pass FROM `users` WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_pass);
            $stmt->fetch();

            if (password_verify($pass, $hashed_pass)) {
                $_SESSION['user'] = $login; // Store user in session
                header("Location: profile.php");
                exit();
            } else {
                echo "<p>Invalid password.</p>";
            }
        } else {
            echo "<p>User not found.</p>";
        }

        $stmt->close();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        h1, h2, h3, h4, p, a {
            color: white;
        }
    </style>
</head>
<body>
<center>
<h1>Login to Gamma ID</h1>
<form action="" method="post">
    <input type="text" placeholder="Login" name="login" required><br><br>
    <input type="password" placeholder="Password" name="pass" required><br><br>
    <button type="submit">Login</button>
</form>	
</center>
</body>