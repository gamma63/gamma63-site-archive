<?php
	require_once "../include/config.php";

	if(empty($_SESSION['user'])){
		header("Location: login.php");
	}

	$change = "UPDATE users SET pass = '" .password_hash($_POST['pass'], PASSWORD_DEFAULT). "' WHERE id = '" .$_SESSION['user']['user_id']. "'";
	$user = mysqli_fetch_assoc(mysqli_query($db, 'SELECT pass FROM users where id = ' .(int)$_SESSION['user']['user_id']));

	if(isset($_POST['do_change'])){
		if(!password_verify($_POST['oldpass'], $user['pass'])){
			$error = 'Old password is not valid!';
		}

		if($_POST['pass'] != $_POST['pass2']){
			$error = 'Second password is not valid';
		}

		if(empty(trim($_POST['pass']))){
			$error = 'Password is empty';
		}
		
		if(empty($error)){
			mysqli_query($db, $change);
			header("Location: logout.php");
		}
	}
?>
<html>
<head>
	<?php include '../include/html/head.php'; ?>
    <title>Edit Account</title>
</head>
<body>
	<?php include '../include/html/header.php'; ?>
	<div class="main_app">
		<div class="main">
			<h1>After changing password you need to re-login!</h1>
			<form action="pass.php" method="POST">
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
			<p><?php echo($error); ?></p>
		</div>
	</div>
	<?php include "../include/html/footer.php" ?>
</body>
</html>
<?php mysqli_close($db);