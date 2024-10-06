<?php
	require_once "../include/config.php";

	if(isset($_SESSION['user'])){
		header("Location: $url");
	}

	if(isset($_POST['do_login'])){
		$data = json_decode(file_get_contents($url. '/api/login.php?username=' .urlencode($_POST['username']). '&password=' .urlencode($_POST['password'])), true);

		if(empty($data['error_code'])){
			$_SESSION['user'] = $data;

			header("Location: $url");
		} else {
			$error = $data['error_msg'];
		}
	}
?>

<html>
<head>
	<?php include '../include/html/head.php'; ?>
    <title>Login</title>
</head>
<body>
	<?php include '../include/html/header.php'; ?>
	<div class="main_app">
		<div class="main">
		<center>
			<form action="login.php" method="POST">
				<p>Email:</p>
				<input type="email" name="username">
				<p>Password:</p>
				<input type="password" name="password">
				<p>
				<button type="submit" name="do_login">Login</button>
				</p>
			</form>
			</center>
			<p><?php echo($error); ?></p>
		</div>
	</div>
	<?php include "../include/html/footer.php" ?>
</body>
</html>
<?php mysqli_close($db);