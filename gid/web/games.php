<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../include/config.php";
include '../include/user.php';

// Check if user is logged in
if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Function to get all games
function getAllGames($db) {
    $stmt = mysqli_prepare($db, 'SELECT id, user_id, title, date, game_file FROM games ORDER BY date DESC');
    if (!$stmt) {
        die('mysqli_prepare() failed: ' . mysqli_error($db));
    }
    
    mysqli_stmt_execute($stmt);
    
    // Bind the result variables
    mysqli_stmt_bind_result($stmt, $id, $user_id, $title, $date, $game_file);
    
    $games = [];
    while (mysqli_stmt_fetch($stmt)) {
        $games[] = [
            'id' => $id,
            'user_id' => $user_id,
            'title' => $title,
            'date' => $date,
            'game_file' => $game_file
        ];
    }
    mysqli_stmt_close($stmt);
    return $games;
}

// Handle game upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $user_id = $_SESSION['user']['user_id'];
    $error = 0;

    // Validate input
    if (empty(trim(strip_tags($_POST['text']))) && empty($_FILES['file']['tmp_name'])) {
        $_SESSION['error'] = 'You must provide text or upload a file!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Check if a file was uploaded
    if ($_FILES['file']['error'] == 0) {
        // Validate the file type
        $allowedTypes = ['application/x-shockwave-flash', 'application/octet-stream'];
        $fileType = $_FILES['file']['type'];
        $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if (!in_array($fileType, $allowedTypes) || strtolower($fileExtension) !== 'swf') {
            $_SESSION['error'] = 'Invalid file format. Only SWF files are allowed.';
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Move the uploaded SWF file to the desired directory
        $filesrc = '../cdn/games/' . uniqid() . '.swf';
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filesrc)) {
            $_SESSION['error'] = 'Failed to upload file.';
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $filesrc = null; // No file uploaded
    }

    // Insert the game data into the database
    $post = "INSERT INTO games (user_id, post, date, game_file) VALUES (
        '" . (int)$user_id . "',
        '" . mysqli_real_escape_string($db, strip_tags($_POST['text'])) . "',
        '" . time() . "',
        '" . ($filesrc ? $filesrc : '') . "'
    )";

    if (mysqli_query($db, $post)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Database error: " . mysqli_error($db);
    }
}

// Fetch all games
$games = getAllGames($db);
?>

<html lang="en">
<head>
    <?php include '../include/html/head.php'; ?>
    <title><?php echo($lang_settings); ?></title>
</head>
<body>
    <center>
    <h1>Upload a New Game</h1>
    <form action="games.php" method="post" enctype="multipart/form-data">
        <textarea name="text" placeholder="Game name" required></textarea>
        <br><br>
        <input type="file" name="file" accept=".swf" required>
        <br><br>
        <button type="submit">Upload Game</button>
    </form>

    <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <h2>Available Games</h2>
    <?php foreach ($games as $game): ?>
        <h3>
            <a href="game_player.php?id=<?php echo htmlspecialchars($game['id']); ?>">
                <?php echo htmlspecialchars($game['title']); ?>
            </a>
        </h3>
        <p>Uploaded by User ID: <?php echo htmlspecialchars($game['user_id']); ?></p>
        <p>Date: <?php echo date('Y-m-d H:i:s', $game['date']); ?></p>
    <?php endforeach; ?>
    </center>
</body>
</html>
