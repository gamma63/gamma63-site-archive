<?php
    if(isset($_SESSION['user'])){
        $checkban = mysqli_fetch_assoc(mysqli_query($db, 'SELECT ban FROM users WHERE id = ' .(int)$_SESSION['user']['user_id']));

        if($_SESSION['user']['ban'] == 1 or $checkban['ban'] == 1){
            $_SESSION['user']['ban'] = 1;
            header("Location: ban.php");
        }
    }
?>
