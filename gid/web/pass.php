<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    $change = "UPDATE users SET pass = '" .password_hash($_POST['pass'], PASSWORD_DEFAULT). "' WHERE id = '" .$_SESSION['user']['user_id']. "'";
	$user = $db->query('SELECT pass FROM users where id = ' .(int)$_SESSION['user']['user_id'])->fetch();

	if(isset($_POST['do_change'])){
		if(!password_verify($_POST['oldpass'], $user['pass'])){
			$error = 'Old password is incorrect!';
		}

		if($_POST['pass'] != $_POST['pass2']){
			$error = 'Second password is incorrect';
		}

		if(empty(trim($_POST['pass']))){
			$error = 'Password is empty';
		}
		
		if(empty($error)){
			$db->query($change);
			header("Location: index.php");
		}
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
    <div class="page">
        <form method="post">
        <p>
			<p>Old password: </p>
			<input type="password" name="oldpass">
		</p>
		<p>
			<p>New password: </p>
			<input type="password" name="pass">
		</p>
		<p>
			<p>Confirm new password:</p>
			<input type="password" name="pass2">
		</p>
		<p>
			<button type="submit" name="do_change">Change password</button>
		</p>
        </form>
    </div><br>
	<?php include '../include/web/footer.php'; ?>  
</body>
</html>