<?php

require_once('db.php');

$login=$_POST['login'];
$pass=$_POST['pass'];

if(empty($login) || empty($pass)){	
} else {
	
 $sql="SELECT * FROM `users` WHERE login = '$login' AND pass='$pass'";	
 $result = $conn->query($sql);
 
	
 if($result->num_rows > 0){
	
	while($row=$result -> fetch_assoc()){
		
		echo"Welcome".$row['login'];
		echo"!";
		header("Location: ../index.php");
}
}
}
?>

<head>
    <title>Login</title>
</head>

<style>
    h1, h2, h3, h4, p, a {
        color: white;
    }
</style>

<center>
<h1>Login to the gamma id</h1>
<form action="" method="post">
		<input type="text" placeholder="Login" name="login"><br>
		<br>
		<input type="password" placeholder="Password" name="pass"><br>
		<br>
		<input type="password" placeholder="Confirm Password" name="r_pass"><br>
	    <br>
		<br>
		<button type="submit">Login</button>
</form>	
</center>