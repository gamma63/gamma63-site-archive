<head>
    <title>Games</title>
</head>

<style>
    h1, h2, h3, h4, p, a {
        color: white;
    }
	
	table td {
		text-align: center; /* Center text horizontally */
	}

	body {
		color: white;
	}

	a {
		color: white;
	}
    <?php
    $browser = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($browser, 'MSIE') !== false) {
        echo '    h1, h2, h3, h4, p, a {
        color: black;
    } 	body {
		color: black;
	}

	a {
		color: black;
	}';
    }
    ?>
</style>

<center>
    <img src="../img/2048.png" width="128" height="128">
    <p>2048</p>
    <a href="2048.php">Play</a>
    <br><br>
    <img src="../img/tetris.png" width="128" height="128">
    <p>Tetris</p>
    <a href="tetris.php">Play</a>
    <br><br>
    <img src="../img/quake.png" width="128" height="128">
    <p>Quake</p>
    <a href="quake.php">Play</a>
    <br><br>
    <img src="../img/xiaoxiao.png" width="128" height="128">
    <p>Xiao Xiao Flight 3</p>
    <a href="xxf3.php">Play</a>
    <br><br>
    <img src="../img/meatboy.png" width="128" height="128">
    <p>Meatboy</p>
    <a href="mb.php">Play</a>
    <br><br>
    <img src="../img/ducklife.png" width="128" height="128">
    <p>Duck Life 1</p>
    <a href="dl1.php">Play</a>
    <br><br>
    <img src="../img/ducklife.png" width="128" height="128">
    <p>Duck Life 2</p>
    <a href="dl2.php">Play</a>
    <br><br>
    <img src="../img/alien-hominid.jpg" width="128" height="128">
    <p>Alien Hominid</p>
    <a href="ah.php">Play</a>
    <br><br>
    <img src="../img/stickmin.jpg" width="128" height="128">
    <p>Henry Stickmin: Breaking the bank</p>
    <a href="hs.php">Play</a>
    <br><br>
    <img src="../img/vex.png" width="128" height="128">
    <p>Vex 1</p>
    <a href="vex.php">Play</a>
    <br><br>
    <img src="../img/pong.png" width="128" height="128">
    <p>Pong</p>
    <a href="pong.php">Play</a>
    <br><br>
</center>