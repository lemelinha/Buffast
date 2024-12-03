<?php

    $time = 3600 * 24 * 7 * 2; // 2 semanas
    ini_set('session.gc_maxlifetime', $time);
    ini_set('session.cookie_lifetime', $time);
    session_set_cookie_params($time);

    ini_set('display_errors', true);

    date_default_timezone_set('America/Sao_Paulo');

    session_start();
    require '../vendor/autoload.php';

    new \App\Bootstrap;

?>

