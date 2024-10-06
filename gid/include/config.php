<?php
    require_once 'db.php';

    session_start();

    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Netscape') !== false) {
        $protocol = 'http';
    } else {
        $protocol = 'https';
    }
    
    $url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/gid';
    $sitename = 'Gamma World';
    $favicon = '/favicon.ico';
    $style = 'gw';
    $lang = 'en.php';
    $enable_antispam = true;
    $antispam = 60;
    $links = array(
        'Github' => 'https://github.com/gamma63/gamma63-site-archive',
        'VepurOVK' => 'https://vepurovk.xyz/gw',
        'Forum' => 'http://gamma-world.eu/bitbybyte-forum'
    );

    // Выполнение конфига

    include "../lang/$lang";

    $db = mysqli_connect(
        $dbconn['server'], 
        $dbconn['user'], 
        $dbconn['pass'], 
        $dbconn['db']
    );

    mysqli_set_charset($db,"utf8mb4");

    if($db == false){
        echo('Error when connecting db');
        echo mysqli_connect_error();
    }
?>
