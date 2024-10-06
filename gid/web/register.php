<?php
	require_once "../include/config.php";

	if(isset($_SESSION['user'])){
		header("Location: $url");
	}

	$checkemail = 'SELECT email FROM users WHERE email = "' .$_POST['email']. '"';
	$checkip = 'SELECT ip FROM users WHERE ip = "' .$_SERVER['REMOTE_ADDR']. '"';
	$createacc = 'INSERT INTO users(name, email, pass, ip, descr) VALUES (
		"' .mysqli_real_escape_string($db, $_POST['username']). '", 
		"' .mysqli_real_escape_string($db, $_POST['email']). '", 
		"' .password_hash($_POST['pass'], PASSWORD_DEFAULT). '", 
		"' .$_SERVER['REMOTE_ADDR']. '", 
		"' .mysqli_real_escape_string($db, $_POST['descr']). '"
	)';
							
	if(isset($_POST['do_signup'])){
		if(empty(trim($_POST['username']))){
			$text = 'Write your nickname!';
		}
						
		if(empty(trim($_POST['email']))){
			$text = 'Write your email!';
		}
						
		if(empty(trim($_POST['pass']))){
			$text = 'Write your password!';
		}	
						
		if($_POST['pass2'] != $_POST['pass'] ){
			$text = 'Passwords does not match!';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$text = 'This email is not an actual email';
		}
						
		if((mysqli_num_rows(mysqli_query($db, $checkemail))) != 0){
			$text = 'Email is occupied!';
		}	

		if(mysqli_num_rows(mysqli_query($db, $checkip)) != 0){
			$text = 'You are alerady registered!';
		}

		if(empty(trim($text))){
			if(mysqli_query($db, $createacc)){
				$text = 'Registration was successfull';
			} else {
				$text = 'Server error';
			}
		}
	}
?>

<html>
	<head>
		<?php include '../include/html/head.php'; ?>
		<title>Регистрация</title>
	</head>
	<body>
		<?php include '../include/html/header.php'; ?>
		<div class="main_app">
			<div class="main">
				<center>
				<form action="register.php" method="POST">
					<p>Nickname:</p>
					<input type="text" name="username" maxlength="50" value="<?php echo $_POST['username']; ?>">
					<p>Email:</p>
					<input type="email" name="email" value="<?php echo $_POST['email']; ?>">
					<p>Password:</p>
					<input type="password" name="pass" maxlength="20" value="<?php echo $_POST['pass']; ?>">
					<p>Repeat your password:</p>
					<input type="password" name="pass2">
					<p>Description of your account:</p>
					<textarea name="descr"></textarea>
					<p>
						<button type="submit" name="do_signup">Register</button>
					</p>
				</form>
				<p><?php echo($text); ?></p><br>
				<p>After registration read <a href="<?php echo($url); ?>/web/terms.php">the TOU</a> <?php echo($sitename); ?></p>
				</center>
			</div>
		</div>
		<?php include "../include/html/footer.php" ?>
	</body>
</html>
<?php mysqli_close($db);