<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);


session_set_cookie_params([
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true

]);


session_start();
session_regenerate_id(true);

/*if(isset($_SESSION["user_id"])){
    if(!isset($_SESSION['last_generation'])){

        regenerate_session_id_loggedin();
    
    }else{
    
        $interval = 60 * 30;
    
        if(time() - $_SESSION['last_generation'] >= $interval){
            regenerate_session_id_loggedin();
        }
    }
}else{
    if(!isset($_SESSION['last_generation'])){

        regenerate_session_id();
    
    }else{
    
        $interval = 60 * 30;
    
        if(time() - $_SESSION['last_generation'] >= $interval){
            regenerate_session_id();
        }
    }
}


function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION['last_generation'] = time();
}

function regenerate_session_id_loggedin(){
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessioId = session_create_id();
    $sessionId = $newSessioId . "_" . $userId;
    session_id($sessionId);

    $_SESSION['last_generation'] = time();
}*/
