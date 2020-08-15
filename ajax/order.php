<?php
$_POST = json_decode(file_get_contents("php://input"), true);
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/order.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sharedMethods.php';

//Handling ajax request to delete order from the table
if(isset($_POST['id'])){
    $id = checkInput($_POST['id']);
    $response = deleteOrderById($id);
    echo json_encode($response);
}
?>