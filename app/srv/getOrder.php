<?php
    include("getOrdersFromFile.php");
    
	$code = (string)$_GET["code"];
    $orders = GetOrdersFromFile("/../../onlineOrders", "onlineOrders.db");
    if($orders){
        if(array_key_exists($code, $orders)) {
            $orderResult = $orders[$code];
            header('Content-Type: application/json');
            echo json_encode(['order'=> $orderResult]);
        } else {
            $response = 'The order doesn\'t exist';
            header('Content-Type: application/json');
            echo json_encode(['res'=> $response]);
        }
    } else {
        $response = 'There are no orders';
        header('Content-Type: application/json');
        echo json_encode(['res'=> $response]);
    }
?>