<?php
    function GetOrdersFromFile($path) {
        $file = __DIR__ . $path;
        if (file_exists($file)) {
            $serializedOrders = file_get_contents($file);
            if ($serializedOrders) {
                $orders = unserialize($serializedOrders);
                if (!is_array($orders)) $orders = [];
            }
            return $orders;
        } else return false;
    }
?>