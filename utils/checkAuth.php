<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/db.php';

    function getToken($token){
        global $conn;
        $query = $conn->prepare("SELECT userId FROM token WHERE token = :token");
        $query->execute(array('token'=>$token));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function isLoggedIn(){
        $hasTokenCookie = isset($_COOKIE['token']);
        if($hasTokenCookie){
            $token = $_COOKIE['token'];
            if(getToken($token))
                return getToken($token);
        }
    }

