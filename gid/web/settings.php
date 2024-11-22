<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";

    $user = new user();

    if(isset($_POST['do_change'])){
        $result = $user->change($_SESSION['user']['token'], $_POST['name'], $_POST['desc'], $_POST['yespost']);
    }

    $data = $user->profile($_SESSION['user']['token'], $_SESSION['user']['user_id']);
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
    <?php include '../include/web/header.php'; ?>     
    <div class="page">
        <form method="post">
            <p>
                <p>Name: </p>
                <?php echo('<input type="text" name="name" value="' .$data['username']. '">'); ?>
            </p>
            <p>
                <p>Description: </p>
                <?php echo('<textarea name="desc">' .$data['description']. '</textarea'); ?>
            </p>
            <p>
                <p>Allow to write on the wall: </p>
                <select name="yespost">
					<option value="0">Disallow</option>
					<option value="1">Allow</option>
				</select>
            </p>
            <button type="submit" name="do_change">Change</button>
        </form><br>
        <?php
            if($user_account['2fa'] == 1){
                echo('<center><p>2fa is enabled</p></center>');
            } else{
                echo('<center><a href="otp.php">Add 2fa to your account</a></center><br>');
            }
        ?>
        <a href="pass.php">Change password</a>
    </div><br>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>