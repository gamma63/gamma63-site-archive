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
<h1>Adding view counter to your site.</h1>
<p>So, imagine you have a simple site with html, head and body and footer tags.</p>
<p>What we are doing is simply putting <a href="w10_counter_code.txt">this</a> code somewhere in the footer</p>
<p>Example: the Gamma World simply putted view counter to the footer tag.</p>
<p>P.S where is yoursite.w10.site put your web 1.0 hosted website domain name</p>
</center>