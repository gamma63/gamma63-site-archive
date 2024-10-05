<?php
    require_once 'db.php';

    session_start();

    $url = 'https://' .$_SERVER['HTTP_HOST'] . '/gid';
    $sitename = 'Gamma World';
    $favicon = '/favicon.ico';
    $style = 'gw';
    $lang = 'en.php';
    $enable_antispam = true;
    $antispam = 60;
    $links = array(
        'Github' => 'https://github.com/gamma63/gamma63-site-archive',
        'VepurOVK' => 'https://vepurovk.xyz/gw',
        'Forum' => 'https://gamma-world.eu/bitbybyte-forum'
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
