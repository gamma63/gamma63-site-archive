<head>
    <title>Reading</title>
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
<h1>Adding guestbook to your site.</h1>
<p>So, imagine you have a simple site with html, head and body tags.</p>
<p>What we are doing is simply putting <a href="w10_gb_code.txt">this</a> code somewhere in the body</p>
<p>Example: the Gamma World simply putted guestbook to the main tag which itself is inside of body.</p>
</center>