<?php
require_once "../include/config.php";
include '../include/user.php';

$user_id = $_SESSION['user']['user_id'];
$error = 0;

// Check if the user is authenticated
if (token_data($_SESSION['user']['access_token'])['error'] == 0) {
    // Validate input
    if (empty(trim(strip_tags($_REQUEST['text']))) && empty($_FILES['file']['tmp_name'])) {
        http_response_code(400);
        $_SESSION['error'] = 'You must provide text or upload a file!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Check if a file was uploaded
    if ($_FILES['file']['error'] == 0) {
        // Validate the file type
        if ($_FILES['file']['type'] != 'application/x-shockwave-flash') {
            $_SESSION['error'] = 'Invalid file format. Only SWF files are allowed.';
            http_response_code(400);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Move the uploaded SWF file to the desired directory
        $filesrc = '../cdn/games/' . uniqid() . '.swf';
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filesrc)) {
            $_SESSION['error'] = 'Failed to upload file.';
            http_response_code(500);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $filesrc = null; // No file uploaded
    }

    // Insert the game data into the database
    $post = "INSERT INTO games (id_user, post, date, swf) VALUES (
        '" . (int)$user_id . "',
        '" . mysqli_real_escape_string($db, strip_tags($_REQUEST['text'])) . "',
        '" . time() . "',
        '" . ($filesrc ? $filesrc : '') . "'
    )";

    if (mysqli_query($db, $post)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        http_response_code(500);
        echo "Database error: " . mysqli_error($db);
    }
} else {
    http_response_code(400);
    echo "Bad request / token";
}
?>
