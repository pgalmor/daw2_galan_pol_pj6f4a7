function NewOrder(){
    console.log('order sent');

    const values = new FormData(document.getElementById("formOrder"));
    const order = document.getElementById("result");

    const ip = "laptop-q7tn42mh";
    const path = "pj6/eCommerce/app/srv";
    const file = "newOrder.php";
    const request = "https://" + ip + "/" + path + "/" + file;
    
    fetch(request, { method: 'POST', body: values }) //Aqui habria q calcular el preu total i ponerselo
    .then(response => response.json())
    .then(result => {
        if(result.price) order.textContent =  "The total cost is " + result.price + "€";
        else order.textContent =  result.res;
    })
    .catch(errors => {				
        console.log(errors);		
        order.textContent = "Error sending the order";
    });
}

function CheckValidity() {
    'use strict'
    let isValidated = false;
    const form = document.getElementById('formOrder')
    if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    } else{ isValidated = true }
    form.classList.add('was-validated');

    if(isValidated){
        NewOrder();
        document.getElementById("code").value="";
        document.getElementById("name").value="";
        document.getElementById("address").value="";
        document.getElementById("email").value="";
        document.getElementById("phone").value="";
        document.getElementById("value1").value="";
        document.getElementById("value2").value="";
        document.getElementById("value3").value="";
        document.getElementById("value4").value="";
        document.getElementById("option1").checked = false;
        mostraValor(1);
        document.getElementById("option2").checked = false;
        mostraValor(2);
        document.getElementById("option3").checked = false;
        mostraValor(3);
        document.getElementById("option4").checked = false;
        mostraValor(4);
        form.classList.remove('was-validated');
    }
}

function mostraValor(num) { 
    const opcioSeleccionada = document.getElementById(`option${num}`);
    const valorOpcioSeleccionada = document.getElementById(`value${num}`);
    if(opcioSeleccionada.checked){
        valorOpcioSeleccionada.classList.remove('d-none');
        valorOpcioSeleccionada.classList.add('d-inline-block');
    }else{
        valorOpcioSeleccionada.classList.remove('d-inline-block');
        valorOpcioSeleccionada.classList.add('d-none');
    }
}