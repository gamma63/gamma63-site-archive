<?php
    require_once 'db.php';

    session_start();

    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'MSIE') == true || strpos($userAgent, 'Netscape') == true) {
        $protocol = 'http';
    } else {
        $protocol = 'https';
    }

    $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/gid';
    $sitename = 'Gamma World';
    $favicon = 'favicon.png';
    $style = 'gw';
    $enable_antispam = true;
    $antispam = 60;
    $links = array(
        'Github' => 'https://github.com/gamma63/gamma63-site-archive',
        'VepurOVK' => 'https://vepurovk.xyz/gw',
        'Forum' => 'http://gamma-world.eu/bitbybyte-forum',
		'OpenVK' => 'https://ovk.to/gw',
		'Telegram' => 'https://t.me/gamma_world'
    );

    // Выполнение конфига

    $db = new PDO("mysql:host=" .$dbconn['server']. ";dbname=" .$dbconn['db'],
        $dbconn['user'],
        $dbconn['pass']
    );

    $db->exec("set names utf8mb4");

    if($db == false){
        echo('Ошибка подключение базы данных');
    }
?>
