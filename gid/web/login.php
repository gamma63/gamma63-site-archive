<?php 
    require_once '../include/config.php';
    include "../api/account.php";

    if(isset($_SESSION['user']['token'])){
        header("Location: user.php");
    }

    if(isset($_POST['login'])){
        $login = new account();
        $info = $login->login($_POST['email'], $_POST['pass'], $_POST['code']);
        if(isset($info['error'])){
            $text = $info['error'];
        } elseif(isset($info['token'])){
            $_SESSION['user'] = $info;
            header("Location: user.php");
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css.css">
    <script src="js.js"></script>
</head>
<body>
    <center>  
    <?php include '../include/web/header.php'; ?>  
    <div class="page">
        <form action="" method="post">
            <p>
                <p>Email:</p>
                <input type="email" name="email">
            </p>
            
            <p>
                <p>Password:</p>
                <input type="password" name="pass">
            </p>
            
            <p>
                <p>2FA (if turned on):</p>
                <input type="text" name="code">
            </p>

            <p>
                <button type="submit" name="login">Login</button>
            </p>
        </form><br>
		</center>
		<?php echo('<p>' .$text. '</p>') ?>
    </div>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>