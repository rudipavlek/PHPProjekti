<?php

ini_set('session.user_only_cookies',1);
ini_set('session.use_script_mode',1);


session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httpsonly' => true
]);

session_start();

session_regenerate_id(true);


if(!isset($_SESSION['last_generation'])){

    session_regenerate_id(true);
    $_SESSION['last_generation'] = time();

}else{

    $interval = 60 * 30;

    if(time() - $_SESSION['last_generation'] >= $interval){
        session_regenerate_id(true);
        $_SESSION['last_generation'] = time();
    }
}