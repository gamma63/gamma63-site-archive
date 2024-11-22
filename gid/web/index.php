<?php 
    require_once '../include/config.php';

    if(isset($_SESSION['user']['token'])){
        header("Location: user.php");
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
    <?php include '../include/web/header.php'; ?>     
    <div class="page">
        <h1>Please register your account, or login to it.</h1>
    </div>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>