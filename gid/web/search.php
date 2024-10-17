<?php
    require_once '../include/config.php';
    include '../include/web/user.php';

    include "../api/search.php";

    $text = '';
    $search = new search();

    $data = $search->get($_GET['q'], $_GET['p']);
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
    <?php $i = 0; foreach($data as $list): ?>
        <?php 
            echo('<a href="user.php?id=' .$list['id']. '"><img src="'); 
            
            if(isset($list['img100'])) { 
                echo($list['img100']); 
            } else { 
                echo('../imgs/usr.gif'); 
            } 
            
            echo('" width="100px" style="float: left; margin-right: 8px;">') 
        ?>
        <?php echo('<h1>' .htmlspecialchars($list['username']). '</h1></a>') ?><br><br><br>
    <?php $i++; endforeach; ?>
    </div><br>
	</center>
    <?php include '../include/web/footer.php'; ?>  
</body>
</html>