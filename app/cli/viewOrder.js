function ViewOrder(code){
    const order = document.getElementById('order');

    const ip = "192.168.1.40";
    const path = "pj6/eCommerce/app/srv";
    const file = "getOrder.php";
    const request = "https://" + ip + "/" + path + "/" + file + "?code=" + encodeURIComponent(code);
    
    fetch(request, { method: 'GET' })
    .then(response => response.json())
    .then(result => {
        if(result.order){
            order.innerHTML =  `<strong>Order Code: ${result.order['code']} -></strong> Full Name: ${result.order['name']} - Address: ${result.order['address']} - Email: ${result.order['email']} - Phone: ${result.order['phone']} <br>
            <strong>Order -></strong> Screws: ${result.order['screw']} uds, Nails: ${result.order['nail']} uds, Screwdrivers: ${result.order['screwdriver']} uds, Hammers: ${result.order['hammer']} uds -> <strong>Price: ${result.order['price']} € </strong><br><br>`;
        } else order.innerHTML = result.res;
    })
    .catch(errors => {					
        order.innerHTML = "Error getting the order";
    });
}