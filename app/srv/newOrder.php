<?php
    $code = isset($_POST['code']) ? (string)$_POST['code'] : '0';
	$name = isset($_POST['name']) ? (string)$_POST['name'] : 'Joan Laporta';
    $address = isset($_POST['address']) ? (string)$_POST['address'] : 'Camp Nou';
    $email = isset($_POST['email']) ? (string)$_POST['email'] : 'laporta@fcb.cat';
    $phone = isset($_POST['phone']) ? (string)$_POST['phone'] : '634283253';
    $value1 = isset($_POST['value1']) ? (string)$_POST['value1'] : '0';
    $value2 = isset($_POST['value2']) ? (string)$_POST['value2'] : '0';
    $value3 = isset($_POST['value3']) ? (string)$_POST['value3'] : '0';
    $value4 = isset($_POST['value4']) ? (string)$_POST['value4'] : '0';

    $price = $value1*0.05 + $value2*0.02 + $value3*6.99 + $value4*8.99;

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

    $file = __DIR__ . "/../../onlineOrders/onlineOrders.db";
	
	$serializedNewOrder = serialize($newOrder);

    $fp = file_put_contents($file, $serializedNewOrder, FILE_APPEND | LOCK_EX);
    //$fp = fopen($file, "wb");
	//fwrite($fp, $serializedNewOrder);
	//fclose($fp);

	header('Content-Type: application/json');
	echo json_encode(['price' => $price]);
?>