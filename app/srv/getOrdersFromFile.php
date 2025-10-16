<?php
    function GetOrdersFromFile($path, $filename) {
        if (!is_dir(__DIR__ . $path)) {
            mkdir(__DIR__ . $path);
        }
        $file = __DIR__ . $path . "/" . $filename;
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