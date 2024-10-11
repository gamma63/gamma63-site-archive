<head>
    <title>Блог</title>
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
<p>20 Сентября, 2024 Года, 4 поколение сайта и другое</p>
<a href="blog/09202024.php"><p>Открыть</p></a>
</center>