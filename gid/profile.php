<?php
session_start();
require_once('db.php');

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get the user ID from the URL, if provided
$userId = isset($_GET['id']) ? (int)$_GET['id'] : null;

// If no ID is provided, use the logged-in user's ID
if ($userId === null) {
    $login = $_SESSION['user'];
    $stmt = $conn->prepare("SELECT id FROM `users` WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->bind_result($userId);
    $stmt->fetch();
    $stmt->close();
}

// Fetch user profile information
$stmt = $conn->prepare("SELECT login, name FROM `users` WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($login, $name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body {
            color: white;
        }
    </style>
</head>
<body>
<center>
<h1>Profile of <?php echo htmlspecialchars($login); ?></h1>
<p>Name: <?php echo htmlspecialchars($name); ?></p>
<a href="edit_profile.php?id=<?php echo $userId; ?>"><p>Edit Profile</p></a> | <a href="user_list.php"><p>Back to User List</p></a> | <a href="logout.php"><p>Logout</p></a>
</center>
</body>
</html>
