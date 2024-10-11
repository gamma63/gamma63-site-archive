<head>
    <title>Contacts</title>
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
    <p>VepurOVK: https://vepurovk.xyz/vv</p>
    <p>VepurOVK Group: https://vepurovk.xyz/gw</p>
    <p>Mastodon: https://indieweb.social/@gamma63</p>
    <p>Email: webe-not-inc@proton.me</p>
    <p>KICQ: 2884835</p>
</center>