<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Gamma World</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="keywords" content="Linux Windows Gamma World GammaWorld gamma world gamma-world gamma-world.eu UNIX Downgrade ZX Spectrum Apple I/II/II Russian EpicSusGames EpicSus Simakov MaynerNET old-web OldWEB old-web.com smolweb Smallweb neocities w10.site narod.ws WebRasbur">
    <meta name="description" content="Gamma World is an downgrade portal with very cool vintage stuff!">
    <style type="text/css">
        #headerArea { margin-top: 10px; }
        #navbar ul { list-style-type: none; padding: 0; margin: 0; }
        #navbar li { display: inline; padding-right: 20px; }
        #rightSidebar { float: right; margin-top: 50px; }
        .box { border: 1px solid; padding: 10px; }

        table td {
            text-align: center; /* Center text horizontally */
        }

        body {
            color: white;
        }

        a {
            color: white;
        }

        iframe {
            width: 100%;
            height: 700px;
            border: none;
        }

        #musicToggle {
            cursor: pointer;
            margin: 10px;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="js/frame-link.js"></script>
    <script>
        let musicPlaying = true;
        const audio = new Audio('snd/music.webm');
        audio.loop = true;
        audio.play();

        function toggleMusic() {
            if (musicPlaying) {
                audio.pause();
                document.getElementById('musicToggle').innerText = 'Turn on music'; // "Turn on music"
            } else {
                audio.play();
                document.getElementById('musicToggle').innerText = 'Turn off music'; // "Turn off music"
            }
            musicPlaying = !musicPlaying;
        }
    </script>
</head>

<body background="img/bg.gif">
    <div align="center"><center>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <img src="img/header.gif"><img src="img/header.gif"><img src="img/header.gif">
                <td id="navbar" style="padding: 5px; border-bottom: none;">
                <nav id="navbar">
                    <ul><br>
                        <li><a href="?z=contents/index.php"><img src="img/home.gif" alt="home"></a></li>
                        <li><a href="contents/feed.rss"><img src="img/news.gif" alt="rss"></a></li>
                        <li><a href="?z=contents/log.php"><img src="img/devlog.gif" alt="devlog"></a></li>
                        <li><a href="?z=contents/archive.php"><img src="img/archive.gif" alt="archive"></a></li>
                        <li><a href="?z=contents/games.php"><img src="img/games.gif" alt="games"></a></li>
                        <li><a href="?z=contents/contacts.php"><img src="img/contact.gif" alt="contacts"></a></li>
                        <li><a href="?z=contents/movies.php"><img src="img/movies.png" alt="movies"></a></li>
                        <li><a href="?z=contents/tutorials.php"><img src="img/tutorial.gif" alt="tutorials"></a></li>
                        <li><a href="?z=contents/midi.php"><img src="img/music.png" alt="music"></a></li>
                        <li><a href="https://gamma-world.eu/bitbybyte-forum"><img src="img/forum.gif" alt="forum"></a></li>
                        <li><a href="?z=gid/register.php"><img src="img/register.gif" alt="register"></a></li>
                        <li><a href="?z=gid/login.php"><img src="img/login.gif" alt="login"></a></li>
                        <li><a href="?z=gid/user_list.php"><img src="img/users.gif" alt="User List"></a></li>
                        <li><a href="?z=gid/profile.php"><img src="img/profile.gif" alt="Profile"></a></li>
                        <li><a href="?z=contents/other.php"><img src="img/other.png" alt="other"></a></li>
                    </ul>
                </nav>

                    <br><br>
                    <img src="img/header.gif"><img src="img/header.gif"><img src="img/header.gif">
                </td>
            </tr>
        </table>

        <button id="musicToggle" onclick="toggleMusic()">Turn off music</button> <!-- "Turn off music" -->
        
        <table border="0">
            <tr>
                <td>
                    <iframe id="mainframe" src="contents/index.php"></iframe>
                    <footer id="footer">
                        &copy; 2024 Gamma World, tested in mypal<br>
                        <br>
                        <!-- banner images -->
                        <a href="http://www.old-web.com"><img src="http://www.old-web.com/images/banners/button.gif" width="88" height="31" border="0"></a>
                        <a href="http://old.net.eu.org"><img src="http://old.net.eu.org/hamsterbutton.png" alt="Get ready to hamsterization!" width="88" height="31"></a>
                        <a href="http://bitbybyte.w10.site" title="Личный сайт BitByByte." target="_blank"><img src="http://bitbybyte.w10.site/banners/bitbybyte.gif" alt="BitByByte's site" border="0"></a>
                        <a href="https://epicsusgames.com"><img src="http://gamma-world.eu/epicsus_button.gif" alt="EpicSusGames"></a>
                        <a href="http://web-rasbur.42web.io" target="_blank"><img src="img/webrasbur.gif" alt="Web-Rasbur"></a>
                        <a href="http://mayner-net.42web.io"><img src="img/mnetad.png" alt="mayner-net"></a>
                        <a href="http://yarik21yt.serv00.net" target="_blank"><img src="http://yarik21yt.serv00.net/assets/splash_btn.png" alt="YARIK21YT-SITE"></a>
                        <a href="http://sobka228.github.io/" title="Новости, Блог, Проекты, Приколюхи, ПОБЕГ ОТ СОБКЕ. Заходи к нам!" alt="Новости, Блог, Проекты, Приколюхи, ПОБЕГ ОТ СОБКЕ. Заходи к нам!"><img src="http://sobka228.github.io/logo.gif" width="88" height="31" border="0"> </a>
                        <a href="http://netquake.io/quake"><img src="img/quake.gif" alt="QUAKE now! (WASM required)"></a>
                        <p>
                        <a href="http://www.theoldnet.com/#frombadge" title="Are you tired of this new Internet yet? Time to Get TheOldNet!">
                        <img src="http://theoldnet.com/images/theoldnetanimblur2.gif" width="88" height="31" border=0>
                        <a href="http://narodweb.ru"><img src="http://narodweb.ru/img/banner.gif" width="88" height="31" border="0"></a>
                        <a href="http://home.saursvepur.xyz"><img src="http://home.saursvepur.xyz/img/saursvepur.gif" border="0" alt="Сайт Вепура."></a>
                        <a href="https://who.w0.am"><img src="https://who.w0.am/sex/ban.png" width="88px" height="31px" alt="Who?!"></a>
                        <a href="https://myslivets.com" target="_blank"><img src="img/myslivets.png" alt="Myslivets"></a>
                        <a href="http://kernel.org"><img src="img/linux_powered.gif" alt="Linux Powered"></a>
                        <img src="img/anybrowser.gif" alt="Any Browser">
                        <img src="img/bestview.gif" alt="Best viewed with open eyes">
                        <a href="http://neocities.org"><img src="img/gc.gif" alt="Neocities"></a>
                        <a href="http://www.glennmcc.org/"><img src="img/arachne.gif" alt="Arachne, DOS Browser"></a>
                        </p>
                    </footer>
                </td>
            </tr>
        </table></center></div>
</body>
</html>
