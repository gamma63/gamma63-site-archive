<?php
session_start();
require_once('db.php');

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$login = $_SESSION['user'];

// Fetch current user profile information
$stmt = $conn->prepare("SELECT name FROM `users` WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = htmlspecialchars(trim($_POST['name']));

    // Update user profile information
    $stmt = $conn->prepare("UPDATE `users` SET name = ? WHERE login = ?");
    $stmt->bind_param("ss", $new_name, $login);

    if ($stmt->execute()) {
        echo "<p>Profile updated successfully!</p>";
        header("Location: profile.php");
        exit();
    } else {
        echo "<p>Error updating profile.</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        h1, h2, h3, h4, p, a {
            color: black;
        }
    </style>
</head>
<body>
<center>
<h1>Edit Profile</h1>
<form action="" method="post">
    <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
    <button type="submit">Update Profile</button>
</form>
<a href="profile.php"><p>Back to Profile</p></a>
</center>
</body>
</html>
