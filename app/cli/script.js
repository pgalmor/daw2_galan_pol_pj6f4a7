function NewOrder(){
    console.log('order sent');

    const values = new FormData(document.getElementById("formOrder"));
    const order = document.getElementById("result");

    
    
    const ip = "localhost";
    const path = "pj6/eCommerce/app/srv";
    const file = "newOrder.php";
    const request = "https://" + ip + "/" + path + "/" + file;
    
    fetch(request, { method: 'POST', body: values }) //Aqui habria q calcular el preu total i ponerselo
    .then(response => response.json())
    .then(result => {
        order.textContent =  "The total cost is " + result.price + "€";
    })
    .catch(errors => {						
        order.textContent = "Error sending the order";
    });
}

function ViewOrder(code){
    console.log('button');
    const order = document.getElementById('order');

    const ip = "localhost";
    const path = "pj6/eCommerce/app/srv";
    const file = "getOrder.php";
    const request = "https://" + ip + "/" + path + "/" + file + "?code=" + encodeURIComponent(code);
    
    fetch(request, { method: 'GET' })
    .then(response => response.json())
    .then(result => {
        order.innerHTML =  `<strong>Order Code: ${result.order['code']} -></strong> Full Name: ${result.order['name']} - Address: ${result.order['address']} - Email: ${result.order['email']} - Phone: ${result.order['phone']} <br>
        <strong>Order -></strong> Screws: ${result.order['screw']} uds, Nails: ${result.order['nail']} uds, Screwdrivers: ${result.order['screwdriver']} uds, Hammers: ${result.order['hammer']} uds -> <strong>Price: ${result.order['price']} € </strong><br><br>`;
    })
    .catch(errors => {					
        order.innerHTML = "Error getting the order";
    });
}

//LAPTOP-Q7TN42MH