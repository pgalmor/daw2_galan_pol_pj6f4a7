<?php
    $file = __DIR__ . "/../../onlineOrders/onlineOrders.db";
	$serializedOrders = file_get_contents($file);
	$orders = unserialize($serializedOrders);

	foreach ($orders as $order => $notes_alumne) {
		foreach ($notes_alumne as $mod => $nota) {
			echo "La nota de $cognom del mòdul $mod és $nota<br>";
		}
		echo "<br>";		
	}

    header('Content-Type: application/json');
	echo json_encode(['order' => $resultat_suma]);
?>