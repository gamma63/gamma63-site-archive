<?php

require_once('db.php');

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);
$r_pass = htmlspecialchars($_POST['r_pass']);

if(empty($login)||empty($pass)||empty($r_pass)){
}else{
	if($pass != $r_pass){
		echo "Passwords doesn't match!";
	}else{
		$sql = "INSERT INTO `users`(login, pass) VALUES('$login', '$pass')";

if($conn -> query($sql)){
		
		echo"Success, you are going to be redirected in an moment...";
        header("Location: profile.php");
        die();
		
	}else{
			
			echo"Unknown error";
			
	}
}
}
?>

<head>
    <title>Gamma ID registration</title>
</head>

<style>
    h1, h2, h3, h4, p, a {
        color: white;
    }
</style>

<center>
<h1>Register Gamma ID</h1>          
<form action="" method="post">
<input type="text" placeholder="Login" name="login"><br>
<br>
<input type="password" placeholder="Password" name="pass"><br>
<br>
<input type="password" placeholder="Confirm Password" name="r_pass"><br>
<br>
<br>
<button type="submit">Register</button>
</form>	
</center>