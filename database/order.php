<?php
//    Requests to the database to change data from order table

    require_once $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    function getOrderList(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM orders");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteOrderById($id){
        global $conn;
        $query = $conn->prepare("DELETE FROM orders WHERE id = :id");
        $query->execute(array('id'=>$id));
        $query = $conn->prepare("SELECT * FROM orders");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $isEmpty = count($results) === 0 ? true : false;
        return array('message'=>'success','empty'=>$isEmpty);
    }
?>