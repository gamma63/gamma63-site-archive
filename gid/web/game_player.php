<?php /*
require_once "../include/config.php";
include '../include/user.php';

// Check if user is logged in
if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Get the game ID from the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $game_id = (int)$_GET['id'];

    // Fetch the game details from the database
    $stmt = mysqli_prepare($db, 'SELECT id_user, post, date, swf FROM games WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $game_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_user, $post, $date, $swf);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Check if the game exists
    if (!$swf) {
        echo "Game not found.";
        exit();
    }
} else {
    echo "Invalid game ID.";
    exit();
} */
?>

<!--
<html lang="en">
<head>
    <?php //include '../include/html/head.php'; ?>
    <title><?php //echo htmlspecialchars($post); ?></title>
</head>
<body>
    <center>
        <h1><?php //echo htmlspecialchars($post); ?></h1>
        <?php //if ($swf): ?>
            <embed src="<?php //echo htmlspecialchars($swf); ?>" type="application/x-shockwave-flash" width="800" height="600">
            <script src="../../js/ruffle.js"></script>
        <?php //endif; ?>
        <p>Uploaded by User ID: <?php //echo htmlspecialchars($id_user); ?></p>
        <p>Date: <?php //echo date('Y-m-d H:i:s', $date); ?></p>
        <a href="games.php">Back to Games</a>
    </center>
</body>
</html>
 -->