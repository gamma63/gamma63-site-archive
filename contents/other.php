<head>
    <title>Other</title>
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
<img src="../img/blog.gif" width="128" height="128">
<p>Blog [Russian]</p>
<a href="blog.php"><p>Open</p></a>
<br><br>
</center>