<head>
    <title>Movies</title>
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
    <img src="http://web1.0hosting.net/b.gif" width="320" height="128">
    <p>Adding chat to your site</p>
    <a href="w10_chat.php"><p>Read</p></a>
    <br><br>
    <img src="http://web1.0hosting.net/b.gif" width="320" height="128">
    <p>Adding view counter to your site</p>
    <a href="w10_counter.php"><p>Read</p></a>
    <br><br>
    <img src="http://web1.0hosting.net/b.gif" width="320" height="128">
    <p>Adding guestbook to your site</p>
    <a href="w10_gb.php"><p>Read</p></a>
    <br><br>
    <img src="http://web1.0hosting.net/b.gif" width="320" height="128">
    <p>Adding likes to your site</p>
    <a href="w10_likes.php"><p>Read</p></a>
    <br><br>
</center>