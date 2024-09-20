<?php
$user_id = $_GET['id'];
$db = mysqli_connect("localhost", "root", "", "regusers"); // scary
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `id`='{$user_id}'");
$array = mysqli_fetch_array($query);

?>

<head>
	<meta charset="UTF-8">
	<title>Gamma World - <?=$array['login']?></title>
</head>
	
<body>
	<center><h1>Profile from "<?=$array['login']?>"</h1></center>
</body>