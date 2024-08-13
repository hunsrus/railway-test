<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1); // only use a session id that is actually created by our server inside te website and make it more complex

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => '152.169.146.69', // cambiar por el dominio (estaba en localhost)
    'path' => '/',
    'secure' => false,  //true
    'httponly' => false //true
]); //SAQUÉ LA SEGURIDAD PARA PODER USAR SESIONES DURANTE LAS PRUEBAS, CUANDO TENGA UN DOMINIO SEGURO, VOLVER A COMO ESTABA

session_start();

if(!isset($_SESSION['last_regeneration']))
{
    regenerate_session_id();
}else{
    $interval = 60*30;
    if(time() - $_SESSION['last_regeneration'] >= $interval)
    {
        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id(true); // regenera una versión más segura del id
    $_SESSION['last_regeneration'] = time();
}