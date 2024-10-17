<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    if($user_account['2fa'] == 1){
        header('Location: settings.php');
    }
    
    require_once "../vendor/autoload.php";

    use Otp\Otp;
    use Otp\GoogleAuthenticator;
    use ParagonIE\ConstantTime\Encoding;
    use chillerlan\QRCode\QRCode;

    if(isset($_POST['do_2fa'])){
        $otp = new Otp();

        if($otp->checkTotp(Encoding::base32DecodeUpper($_SESSION['secret']), $_POST['code'])) {
            $query = "UPDATE users SET secret = '" .$_SESSION['secret']. "' WHERE token = '" .$_SESSION['user']['token']. "'";
            $db->query($query);
            header('Location: settings.php');
        } else{
            $text = 'Incorrect code!';
        }
    }

    $secret = GoogleAuthenticator::generateRandom();
    $_SESSION['secret'] = $secret;
    $qr = GoogleAuthenticator::getKeyUri('totp', 'GID:' . $user_account['username'], $secret);
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
	<center>
    <div class="page">
        <?php 
            echo '<img width="300px" src="'.(new QRCode)->render($qr . '&issuer=GID').'"><br>';
            echo "Your secret key: {$secret}\n"; 
        ?>
        <p>Код:</p>
        <form action="" method="post">
            <input type="text" name="code">
            <button type="submit" name="do_2fa">Link</button>
        </form>
    </div><br>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>