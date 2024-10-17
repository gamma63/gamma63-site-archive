<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";

    $user = new user();

    if(isset($_POST['do_change'])){
        $result = $user->avatar($_SESSION['user']['token']);
        header("Location: index.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma ID</title>
    <link rel="stylesheet" href="css.css">
    <script src="js.js"></script>
</head>
<body>
	<center>
    <div class="page">
        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <p>Avatar: </p>
                <input type="file" name="file">
            </p>
            <button type="submit" name="do_change">Change</button>
        </form>
    </div><br>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>