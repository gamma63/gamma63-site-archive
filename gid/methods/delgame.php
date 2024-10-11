<?php
require_once "../include/config.php";
include '../include/user.php';

// Check if user is logged in
if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Function to get post data by ID
function getPostData($db, $postId) {
    $stmt = mysqli_prepare($db, 'SELECT * FROM games WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $postId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $name, $swf, $date, $id_user); // Adjust based on your table structure
    $postData = [];
    if (mysqli_stmt_fetch($stmt)) {
        $postData = [
            'id' => $id,
            'swf' => $swf,
            'id_user' => $id_user
        ];
    }
    mysqli_stmt_close($stmt);
    return $postData;
}

// Get the post ID from the request
$postId = (int)$_GET['id'];
$postData = getPostData($db, $postId);

// Check if the post exists
if (!$postData) {
    http_response_code(404);
    echo "Post not found.";
    exit();
}

// Check user permissions
$userId = $_SESSION['user']['user_id'];
$userData = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM users WHERE id = ?', $userId));

if (token_data($_SESSION['user']['access_token'])['error'] == 0) {
    if ($postData['id_user'] == $userId || $userData['priv'] >= 2) {
        // Delete the post from the database
        $stmt = mysqli_prepare($db, 'DELETE FROM games WHERE id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $postId);
        if (mysqli_stmt_execute($stmt)) {
            // Delete the associated SWF file
            if (file_exists($postData['swf'])) {
                unlink($postData['swf']);
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            http_response_code(500);
            echo "Error deleting post.";
        }
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(403);
        echo "Access denied.";
    }
} else {
    http_response_code(400);
    echo "Bad request / token";
}

// Close the database connection
mysqli_close($db);
?>
