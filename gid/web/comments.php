<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";
    include "../api/comments.php";

    $text = '';
    $user = new user();
    $wall = new comments();

    // Выкладывание поста

    if(isset($_POST['do_post'])){
        $result = $wall->add($_SESSION['user']['token'], $_POST['text'], $_GET['id']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
    }

    // Удаление поста

    if(isset($_GET['del'])){
        $result = $wall->delete($_SESSION['user']['token'], $_GET['del']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: comments.php?id={$_GET['id']}");
        exit();
    }
    
    $data_wall = $wall->get($_SESSION['user']['token'], $_GET['id'], $_GET['p']);

    // Проверка на существование комментах

    if($data_wall['post']['id_from'] == 0){
        header("Location: index.php");
    } else {
        // Узнавание о пользователях из комментов
        
        $user_ids = '';
        $i = 0;

        foreach($data_wall['comments'] as $data){
            $user_ids = $user_ids . (string)$data['user_id'] . ',';
            $i++;
        }

        $user_ids = $user->getuser($user_ids);
        $user_post = $user->getuser($data_wall['post']['user_id']. ',' .$data_wall['post']['id_from']);
    }
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
            echo('<img style="float: left; margin-right: 8px;" src="'); 
            
            if(isset($user_post[0]['img50'])) { 
                echo($user_post[0]['img50']); 
            } else { 
                echo('../imgs/usr.gif'); 
            } 
            
            echo('" width="50px">'); 
        ?>

        <?php echo("<b>" .htmlspecialchars($user_post[1]['username']). "</b>") ?>

        <?php echo("<span>" .date('d M Y в H:i', $data_wall['post']['date']). "</span>") ?><br>

        <?php echo('<b>От: <a href="user.php?id=' .$user_post[0]['id']. '">' .htmlspecialchars($user_post[0]['username']). '</a></b>') ?>

        <?php if(isset($data_wall['post']['image'])) echo('<img width="100%" src="' .$data_wall['post']['image']. '">') ?>

        <?php echo("<p>" .htmlspecialchars($data_wall['post']['text']). "</p>") ?>

        <hr>
        <h1 align="center">Comments</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <textarea name="text" style="width: 100%;"></textarea>
            <button type="submit" name="do_post">Publish</button><br>
        </form><hr>

        <?php echo('<p>' .$text. '</p>') ?>

        <?php $i = 0; foreach($data_wall['comments'] as $data): ?>
            <div>
                <?php 
                    echo('<img style="float: left; margin-right: 8px;" src="'); 
                    
                    if(isset($user_ids[$i]['img50'])) { 
                        echo($user_ids[$i]['img50']); 
                    } else { 
                        echo('../imgs/blankimg.jpg'); 
                    } 
                    
                    echo('" width="50px">'); 
                ?>

                <?php echo('<b><a href="user.php?id=' .$user_ids[$i]['id']. '">' .htmlspecialchars($user_ids[$i]['username']). '</a></b>') ?>

                <?php if($user_ids[$i]['id'] == $_SESSION['user']['user_id'] or $_SESSION['user']['priv'] >= 2): ?>
                    <div style="float: right;">
                        <?php echo('<a href="?id=' .$_GET['id']. '&del=' .$data['id']. '"><img src="../imgs/del.gif"></a>') ?>
                    </div>
                <?php endif; ?><br>

                <?php echo("<span>" .date('d M Y в H:i', $data['date']). "</span>") ?><br>
                
                <?php if(isset($data['image'])) echo('<img src="' .$data['image']. '">') ?>

                <?php echo("<p>" .htmlspecialchars($data['text']). "</p>") ?>
            </div>
        <?php $i++; endforeach; ?>
    </div>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>