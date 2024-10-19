<html lang="en">

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
		const audio = new Audio('snd/music.webm');
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
			<a target="main" href="contents/archive.php" onclick="playSound();"><img class="twist" src="img/archive.gif">Software</a>
		</li>
		<li>
			<a target="main" href="contents/games.php" onclick="playSound();"><img class="twist" src="img/games.gif">Flash & Non Flash games</a>
		</li>
		<li>
			<a target="main" href="contents/contacts.php" onclick="playSound();"><img class="twist" src="img/contact.gif">Contacts</a>
		</li>
		<li>
			<a target="main" href="contents/movies.php" onclick="playSound();"><img class="twist" src="img/movies.png">Movies</a>
		</li>
		<li>
			<a target="main" href="bitbybyte-forum/index.php" onclick="playSound();"><img class="twist" src="img/forum.gif">Forum</a>
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
		<a href="http://semka.w10.site"><img src="img/semka.png"></a>
		<a href="http://oldicq.ru"><img src="img/kicq.gif" alt="KICQ"></a>
		<a href="http://site.w10.site" title="говносайт" target="_blank"><img src="http://site.w10.site/banner.png" alt="говносайт" border="0"></a>
		<a href="http://ftod.w10.site"><img src="http://ftod.w10.site/pic/ftod.png" width="88" height="31" border="0"></a>
		<a href="https://gifypet.neocities.org" target="_blank">
			<img src="img/gifypet.gif">
		</a>
		<a href="http://mak.w10.site" title="Персональный сайт Maksy" target="_blank"><img src="http://mak.w10.site/button.gif" alt="Maksy's PWS" border="0"></a>
		<a href="http://www.old-web.com"><img src="http://www.old-web.com/images/banners/button.gif" width="88" height="31" border="0"></a>
		<a href="http://old.net.eu.org"><img src="http://old.net.eu.org/hamsterbutton.png" alt="Get ready to hamsterization!" width="88" height="31"></a>
		<a href="http://bitbybyte.w10.site" title="Личный сайт BitByByte." target="_blank"><img src="http://bitbybyte.w10.site/banners/bitbybyte.gif" alt="BitByByte's site" border="0"></a>
		<!--a href="http://web-rasbur.42web.io" target="_blank"><img src="img/webrasbur.gif" alt="Web-Rasbur"></a-->
		<a href="http://mayner-net.42web.io"><img src="img/mnetad.png" alt="mayner-net"></a>
		<a href="http://yarik21yt.serv00.net" target="_blank"><img src="http://yarik21yt.serv00.net/assets/splash_btn.png" alt="YARIK21YT-SITE"></a>
		<a href="http://sobka228.github.io" title="Новости, Блог, Проекты, Приколюхи, ПОБЕГ ОТ СОБКЕ. Заходи к нам!" alt="Новости, Блог, Проекты, Приколюхи, ПОБЕГ ОТ СОБКЕ. Заходи к нам!"><img src="img/sobka.gif" width="88" height="31" border="0"> </a>
		<a href="http://netquake.io/quake"><img src="img/quake.gif" alt="QUAKE now! (WASM required)"></a>
		<p>
		<a href="http://abrbus.ru"><img src="img/banner.gif" width="88" height="31" border="0" /></a>
		<a href="http://www.theoldnet.com/#frombadge" title="Are you tired of this new Internet yet? Time to Get TheOldNet!">
		<img src="http://theoldnet.com/images/theoldnetanimblur2.gif" width="88" height="31" border=0>
		<a href="http://home.saursvepur.xyz"><img src="http://home.saursvepur.xyz/img/saursvepur.gif" border="0" alt="Сайт Вепура."></a>
		<a href="http://who.w0.am"><img src="http://who.w0.am/sex/ban.png" width="88px" height="31px" alt="Who?!"></a>
		<a href="https://myslivets.com" target="_blank"><img src="img/myslivets.png" alt="Myslivets"></a>
		<a href="http://kernel.org"><img src="img/linux_powered.gif" alt="Linux Powered"></a>
		<a href="http://winworldpc.com/product/internet-explorer/ie-5"><img src="img/ie5.gif" alt="at least IE 5.0"></a>
		<img src="img/bestview.gif" alt="Best viewed with open eyes">
		<a href="http://neocities.org"><img src="img/gc.gif" alt="Neocities"></a>
		<a href="http://www.glennmcc.org/"><img src="img/arachne.gif" alt="Arachne, DOS Browser"></a>
		<a href="http://nfixz.w10.site"><img src="http://nfixz.w10.site/banners/nfixz.gif" width=88 height=31></a>
		<a href="http://homepage.w10.site"><img src="http://homepage.w10.site/img/banner.png" width="88" height="31" border="0" /></a>
		<a href="http://nostalgy.net.ru"><img src="img/nnetru.gif" alt="nostalgy net ru"></a>
		</p>
		<p>
		<a href="http://pirogprod.w10.site"><img src="http://pirogprod.w10.site/ico/pirogprodlogo.png" width="88" height="31" border="0"></a>
		<a href="https://melonking.net"><img src="img/MELONKING.GIF"></a>
		<img src="img/phonechump.gif">
		<a href="http://ruffle.rs"><img src="img/flash.gif"></a>
	</div>

	<br>
</html>