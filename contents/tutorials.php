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
    <p>Web 1.0 hosting tutorials</p>
    <a href="w10_list.php"><p>Show Tutorials</p></a>
    <br><br>
</center>