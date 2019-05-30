<?php

function is_admin($email, $password)
{   
    global $db;

    $a = [
        'email'     => $email,
        'password'  => sha1($password)
    ];

    //requete sql

    $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";
    $req = $db->prepare($sql);
    $req->execute($a);

    $exist = $req->rowCount($sql);
    return $exist;
}