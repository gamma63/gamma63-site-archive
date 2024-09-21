<?php
session_start();
require_once('db.php');

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Fetch all users from the database
$stmt = $conn->prepare("SELECT id, login, name FROM `users`");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        body {
            color: white;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            color: white;
        }
    </style>
</head>
<body>
<center>
<h1>User List</h1>
<table>
    <tr>
        <th><p>Login</p></th>
        <th><p>Name</p></th>
        <th><p>Profile</p></th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['login']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><a href="profile.php?id=<?php echo $row['id']; ?>"><p>View Profile</p></a></td>
    </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="profile.php"><p>Back to Profile</p></a> | <a href="logout.php"><p>Logout</p></a>
</center>
</body>
</html>

<?php
$stmt->close();
?>
