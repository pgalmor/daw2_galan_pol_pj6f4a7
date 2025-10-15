<?php
	$code = (string)$_GET["code"];
    $file = __DIR__ . "/../../onlineOrders/onlineOrders.db";
	$serializedOrders = file_get_contents($file);
    if ($serializedOrders) {
        $orders = unserialize($serializedOrders);
        if (!is_array($orders)) $orders = [];
    }
	$orderResult = [];
	$orderResult = $orders[$code];

    header('Content-Type: application/json');
	echo json_encode(['order'=> $orderResult]);
?>