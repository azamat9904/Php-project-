<?php
//    Requests to the database to change data from users table

    require_once $_SERVER['DOCUMENT_ROOT'].'/database/db.php';

    function getUserByEmail($email){
        global $conn;
        $query = $conn->prepare("SELECT * FROM users LEFT JOIN token ON users.id = token.userId WHERE email=:email");
        $query->execute(array('email'=>$email));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUserById($id){
        global $conn;
        $query = $conn->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute(array('id'=>$id));
        return $query->fetch(PDO::FETCH_OBJ);
    }
?>