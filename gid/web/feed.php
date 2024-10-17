<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/user.php";
    include "../api/wall.php";

    $text = '';
    $user = new user();
    $wall = new wall();

    // Выкладывание поста

    if(isset($_POST['do_post'])){
        $result = $wall->add($_SESSION['user']['token'], $_POST['text'], $_SESSION['user']['user_id']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php");
        exit();
    }

    // Лайк

    if(isset($_GET['like'])){
        $result = $wall->like($_SESSION['user']['token'], $_GET['like']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php?p={$_GET['p']}#post{$_GET['like']}");
        exit();
    }

    // Закреп

    if(isset($_GET['pin'])){
        $result = $wall->pin($_SESSION['user']['token'], $_GET['pin']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php");
        exit();
    }

    // Удаление поста

    if(isset($_GET['del'])){
        $result = $wall->delete($_SESSION['user']['token'], $_GET['del']);
        if(isset($result['error'])){
            $text = $result['error'];
        }
        header("Location: feed.php");
        exit();
    }


    // Узнавание о пользователях со стены

    $data_wall = $wall->getglobal($_SESSION['user']['token'], (int)$_GET['p']);
    
    $user_ids = '';
    $from_ids = '';
    $i = 0;

    foreach($data_wall as $data){
        $user_ids = $user_ids . (string)$data['user_id'] . ',';
        $from_ids = $from_ids . (string)$data['id_from'] . ',';
        $i++;
    }

    $user_ids = $user->getuser($user_ids);
    $from_ids = $user->getuser($from_ids);
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
        <form action="" method="post" enctype="multipart/form-data">
            <textarea name="text" style="width: 100%;"></textarea>
            <button type="submit" name="do_post">Publish</button><br>
            <a href="javascript:openmenu('file_form');">Attach</a>
            <div class="file_form" style="display: none;">
                <p>Image: </p>
                <input type="file" name="file">
            </div>
        </form><hr>

        <?php echo('<p>' .$text. '</p>') ?>

        <?php $i = 0; foreach($data_wall as $data): ?>
            <div id="post<?php echo($data['id']) ?>">
                <?php 
                    echo('<img style="float: left; margin-right: 8px;" src="'); 
                    
                    if(isset($user_ids[$i]['img50'])) { 
                        echo($user_ids[$i]['img50']); 
                    } else { 
                        echo('../imgs/usr.gif'); 
                    } 
                    
                    echo('" width="50px">'); 
                ?>

                <?php echo("<b>" .htmlspecialchars($from_ids[$i]['username']). "</b>") ?>

                <?php if($data['is_pin'] == true) echo('<center><span>Pinned</span></center>') ?>

                <?php if($from_ids[$i]['id'] == $_SESSION['user']['user_id'] or $_SESSION['user']['priv'] >= 2): ?>
                    <div style="float: right;">
                        <?php echo('<a href="?id=' .$_GET['id']. '&del=' .$data['id']. '"><img src="../imgs/del.gif"></a>') ?>
                    </div>
                <?php endif; ?><br>

                <?php echo("<span>" .date('d M Y в H:i', $data['date']). "</span>") ?><br>

                <?php echo('<b>From: <a href="user.php?id=' .$user_ids[$i]['id']. '">' .htmlspecialchars($user_ids[$i]['username']). '</a></b>') ?>

                <?php if(isset($data['image'])) echo('<br><br><img src="' .$data['image']. '" width="100%">') ?>

                <?php echo("<p>" .htmlspecialchars($data['text']). "</p>") ?>

                <?php echo('<a href="?id=' .$_GET['id']. '&p=' .$_GET['p']. '&like=' .$data['id']. '" style="float: right;">') ?>
                    <?php 
                        if($data['liked'] == true){
                            echo('<img src="../imgs/like_sel.gif">'); 
                        } else{ 
                            echo('<img src="../imgs/like.gif">'); 
                        } 
                    ?>
                <?php echo($data['likes']) ?></a>

                <?php echo('<a href="comments.php?id=' .$data['id']. '">Comments (' .$data['comments']. ')</a>') ?><br>
            </div><br>
        <?php $i++; endforeach; ?>

        <?php 
            if((int)$_GET['p'] >= 1){
                echo('<a style="float: left;" href="?p=' .(int)$_GET['p'] - 1 . '">Back</a>');
            }

            if(count($data_wall) >= 10){
                echo('<a style="float: right;" href="?p=' .(int)$_GET['p'] + 1 . '">Forward</a>');
            }
		?><br>
    </div><br>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>