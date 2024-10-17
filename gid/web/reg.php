<?php 
    require_once '../include/config.php';

	ini_set('display_errors', false);

    if(isset($_SESSION['user']['token'])){
        header("Location: user.php");
    }
							
	if(isset($_POST['do_signup'])){
        $checkemail = "SELECT email FROM users WHERE email = " .$db->quote($_POST['email']);
        $checkip = "SELECT ip FROM users WHERE ip = " .$db->quote($_SERVER['REMOTE_ADDR']);
        $createacc = "INSERT INTO users(name, email, pass, ip) VALUES (
            " .$db->quote($_POST['username']). ", 
            " .$db->quote($_POST['email']). ", 
            '" .password_hash($_POST['pass'], PASSWORD_DEFAULT). "', 
            " .$db->quote($_SERVER['REMOTE_ADDR']). ")";

		if(empty(trim($_POST['username']))){
			$text = 'Write your username!';
		}
						
		if(empty(trim($_POST['email']))){
			$text = 'Write your email!';
		}
						
		if(empty(trim($_POST['pass']))){
			$text = 'Write your password!';
		}	
						
		if($_POST['pass2'] != $_POST['pass'] ){
			$text = 'Second password is incorrect!';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$text = 'Email is seems to be fake!';
		}
						
		if($db->query($checkemail)->rowCount() != 0){
			$text = 'Email is occupied!';
		}	
		
		if($_SESSION['code'] != $_POST['captcha']){
			$text = 'CAPTCHA is incorrect!';
		}	

		if(empty(trim($text))){
			if($db->query($createacc)){
				$text = 'Registration was successfully done';;
			} else {
				$text = 'Server error';
			}
		}
	}
?>

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
        <form action="" method="post">
            <p>
				<p>Nick:</p>
				<input type="text" name="username" maxlength="50">
			</p>
			<p>
				<p>Email:</p>
				<input type="email" name="email">
			</p>
			<p>
				<p>Password:</p>
				<input type="password" name="pass" maxlength="20">
			</p>
			<p>
				<p>Repeat password:</p>
				<input type="password" name="pass2">
			</p>
			<p>
				<p>CAPTCHA:</p>
				<img src="captcha.php"><br>
				<input type="text" name="captcha">
			</p>
			<p>
				<button type="submit" name="do_signup">Register</button>
			</p>
        </form><br>
		<?php echo('<p>' .$text. '</p>') ?>
    </div>
	</center>
	<?php include '../include/web/footer.php'; ?>  
</body>
</html>