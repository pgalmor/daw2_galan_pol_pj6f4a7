</html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders - Galan Hardware Store</title>
    <link rel="icon" type="image/x-icon" href="https://localhost/pj6/eCommerce/app/cli/images/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <img src="">
        <h3>Galan Hardware Store</h3>
    </div>
    <div class="container text-center">
        <?php
            $file = __DIR__ . "/../../onlineOrders/onlineOrders.db";
            $serializedOrders = file_get_contents($file);
            $orders = [];
            if ($serializedOrders) {
                $orders = unserialize($serializedOrders);
                if (!is_array($orders)) $orders = [];
            }

            foreach ($orders as $code => $order) {
                $name = $order['name'];
                $address = $order['address'];
                $email = $order['email'];
                $phone = $order['phone'];
                $phone = $order['phone'];
                $screws = $order['screw'];
                $nails = $order['nail'];
                $screwdrivers = $order['screwdriver'];
                $hammers = $order['hammer'];
                $price = $order['price'];
                echo "<strong>Order Code: $code -></strong> Full Name: $name - Address: $address - Email: $email - Phone: $phone <br>";
                echo "<strong>Order -></strong> Screws: $screws uds, Nails: $nails uds, Screwdrivers: $screwdrivers uds, Hammers: $hammers uds -> <strong>Price: $price € </strong><br><br>";
            }
        ?>
    </div>
    <div class="container text-center">
        <a class="btn btn-primary" href="https://localhost/pj6/eCommerce/app/cli/menu.html">Go Back</a>
        <a class="btn btn-primary" href="https://localhost/pj6/eCommerce/app/cli/index.html">Home</a>
    </div>
</body>
</html>