<!--html lang="en">

<head>
	<style>
	    #musicToggle {
            cursor: pointer;
            margin: 10px;
        }
		
		#click-sound {
            display: none;
        }
		
				body {
			/* Cool dark blue! #000020 */
			background-color: #000014;
			/* background-image: linear-gradient(#1a2964, #00051e); */
			background-image: linear-gradient(#210971, #020010);
			color: yellow;
			text-align: center;
			/* box-shadow: inset 0px 0px 50px 0px #000014; */
		}

		#dungeon {
			background-image: url("img/bg.gif");
			background-size: 50%;
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0px;
			float: left;
			z-index: -10;
			opacity: 0.9;
		}

		a {
			text-decoration: underline;
		}

		a:hover {
			cursor: pointer;
		}

		h1 {
			font-size: 16px;
			padding-top: 10px;
			margin: 0px;
			padding-bottom: 15px;
			color: #ffd596;
		}

		li {
			font-size: 13px;
			margin-bottom: 12px;
			font-weight: bold;
			transform: rotate(6deg);
		}

		ul {
			list-style: none;
			margin: 0;
			padding: 10px 5px 25px 5px;
		}

		li a {
			color: #fffd0c;
		}

		li a:hover {
			color: white;
		}

		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		ul img {
			width: 45px;
		}

		ul img,
		.badges img {
			image-rendering: pixelated;
			image-rendering: crisp-edges;
		}

		.badges img {
			margin-bottom: 5px;
			max-width: 88px;
		}

		.wider img {
			width: 60px;
		}

		.thinner img {
			width: 40px;
		}

		.even-thinner img {
			width: 35px;
		}

		.nav-block {
			background-color: yellow;
			padding: 5px 0 5px 0;
			color: black;
			font-size: 14px;
			margin-bottom: 35px;
		}
	</style>
	<link href="common.css" rel="stylesheet" type="text/css" media="all">
	<script>
		let musicPlaying = true;
		const audio = new Audio('snd/Scott_Holmes_-_14_-_Alien_Wasteland22.mp3');
		audio.loop = true;
		audio.play();

		function toggleMusic() {
			if (musicPlaying) {
				audio.pause();
				document.getElementById('musicToggle'); // "Turn on music"
			} else {
				audio.play();
				document.getElementById('musicToggle'); // "Turn off music"
			}
			musicPlaying = !musicPlaying;
		}

		function playSound() {
			var sound = document.getElementById('click-sound');
			sound.play();
		}
	</script>
</head>


<body>
	<div id="dungeon"></div>
	<audio id="click-sound" src="snd/click.mp3"></audio>
	<ul>
		<li>
			<a target="main" href="contents/index.php" onclick="playSound();"><img class="twist" src="img/home.gif">Home</a>
		</li>
		<li>
			<a target="main" href="contents/feed.rss" onclick="playSound();"><img class="twist" src="img/news.gif">RSS</a>
		</li>
		<li>
			<a target="main" href="contents/contacts.php" onclick="playSound();"><img class="twist" src="img/contact.gif">Contacts</a>
		</li>
		<li>
			<a target="main" href="bitbybyte-forum/index.php" onclick="playSound();"><img class="twist" src="img/forum.gif">Forum [RU]</a>
		</li>
		<li>
			<a target="main" href="gid/web/reg.php" onclick="playSound();"><img class="twist" src="img/register.gif">Register</a>
		</li>
		<li>
			<a target="main" href="gid/web/login.php" onclick="playSound();"><img class="twist" src="img/login.gif">Login</a>
		</li>
		<li>
			<a target="main" href="gid/web/search.php" onclick="playSound();"><img class="twist" src="img/users.gif">User List</a>
		</li>
		<li>
			<a target="main" href="gid/web/feed.php" onclick="playSound();"><img class="twist" src="img/feed.gif">Feed</a>
		</li>
		<li>
			<a target="main" href="gid/web/settings.php" onclick="playSound();"><img class="twist" src="img/settings.gif">Settings</a>
		</li>
		<li>
			<a target="main" href="gallery/index.html" onclick="playSound();"><img class="twist" src="img/gallery.gif">Gallery</a>
		</li>
		<li>
			<a target="main" onclick="toggleMusic()"><img class="twist" src="img/mutus.gif">Toggle music</a>
		</li>
		<li>
			<a target="main" href="contents/other.php" onclick="playSound();"><img class="twist" src="img/other.png">Other</a>
		</li>
		<li>
			<a target="main" href="gid/web/logout.php" onclick="playSound();"><img class="twist" src="img/logout.gif">Logout</a>
		</li>
	</ul>
	<br><br>
	
	<h1>(C) 2024 Gamma World</h1>
	<div class="badges">
		<!-- banner images -->

	</div>

	<br>
</html> -->