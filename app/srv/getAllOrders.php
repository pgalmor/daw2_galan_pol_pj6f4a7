</html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders - Galan Hardware Store</title>
    <link rel="icon" type="image/x-icon" href="https://192.168.1.40/pj6/eCommerce/app/cli/images/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://192.168.1.40/pj6/eCommerce/app/cli/style.css" rel="stylesheet">
</head>
<body>
    <div class="body-container">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <img src="https://192.168.1.40/pj6/eCommerce/app/cli/images/logo.png" alt="Logo" class="me-3" style="width: 60px; height: 60px;">
            <h2 class="form-title m-0">All Orders</h2>
        </div>
        <div class="container text-center">
            <p class="order-result">
            <?php
                include("getOrdersFromFile.php");

                $orders = GetOrdersFromFile("/../../onlineOrders/onlineOrders.db");
                if($orders){
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
                } else echo "There are no orders";
            ?>
            </p>
        </div>
        <div class="btn-group-custom">
            <a class="btn btn-custom" href="https://192.168.1.40/pj6/eCommerce/app/cli/menu.html">Menu</a>
            <a class="btn btn-custom" href="https://192.168.1.40/pj6/eCommerce/app/cli/index.html">Home</a>
        </div>
    </div>
</body>
</html>