<?php
    $file = __DIR__ . "/../../onlineOrders/onlineOrders.db";
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if ($content) {
            $orders = unserialize($content);
            if (!is_array($orders)) $orders = [];
        }
    } else $orders = [];
    
    $code = isset($_POST['code']) ? (string)$_POST['code'] : '0';
    
    $name = isset($_POST['name']) ? (string)$_POST['name'] : 'Joan Laporta';
    $address = isset($_POST['address']) ? (string)$_POST['address'] : 'Camp Nou';
    $email = isset($_POST['email']) ? (string)$_POST['email'] : 'laporta@fcb.cat';
    $phone = isset($_POST['phone']) ? (string)$_POST['phone'] : '634283253';
    $option1 = isset($_POST['option1']) ? (bool)$_POST['option1'] : false;
    $value1 = isset($_POST['value1']) ? (string)$_POST['value1'] : '0';
    $option2 = isset($_POST['option2']) ? (bool)$_POST['option2'] : false;
    $value2 = isset($_POST['value2']) ? (string)$_POST['value2'] : '0';
    $option3 = isset($_POST['option3']) ? (bool)$_POST['option3'] : false;
    $value3 = isset($_POST['value3']) ? (string)$_POST['value3'] : '0';
    $option4 = isset($_POST['option4']) ? (bool)$_POST['option4'] : false;
    $value4 = isset($_POST['value4']) ? (string)$_POST['value4'] : '0';

    $price = 0;
    if($option1) $price += $value1*0.05;
    if($option2) $price += $value2*0.02;
    if($option3) $price += $value3*6.99;
    if($option4) $price += $value4*8.99;
    $price = round($price*1.21,2);

    $newOrder = array(
        'code'=> $code,
        'name'=> $name,
        'address'=> $address,
        'email'=> $email,
        'phone'=> $phone,
        'screw'=> $value1,
        'nail'=> $value2,
        'screwdriver'=> $value3,
        'hammer'=> $value4,
        'price' => $price
    );

    $orders[$code] = $newOrder;
    $serializedOrders = serialize($orders);
    $fp = file_put_contents($file, $serializedOrders, LOCK_EX);

    header('Content-Type: application/json');
    echo json_encode(['price' => $price]);
?>