<?php

//hashing password example

$pwd = "aeea";

$options = [
    'cost' => 10   // valor recomendado entre 10 y 12. mientras más grande sea es más seguro pero demora más tiempo
];

$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

$pwdLogin = "aeea";
if(password_verify($pwdLogin, $hashedPwd))
{
    echo "Son iguales";
}else{
    echo "No son iguales";
}