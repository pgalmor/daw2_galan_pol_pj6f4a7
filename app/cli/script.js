function NewOrder(){
    console.log('order sent');

    const valors = new FormData(document.getElementById("FormCalc")); //Obtenció dels valors del formulari dins de la variable valors
    const result = document.getElementById("result");
                    
    // Construcció de la petició
    const ip = "localhost"; //adreça IP del servidor
    const carpeta = "pj6/sm6ex5"; // carpeta a on es troba el fitxer PHP
    const fitxerPHP = "sm6ex5.php"; // nom del fitxer PHP
    const peticio = "http://" + ip + "/" + carpeta + "/" + fitxerPHP;
    //const peticio = fitxerPHP;
    
    // Enviat la petició, esperant la resposat i recollint la resposta sense haver de recarregar la página 
    fetch(peticio,{
            method: 'POST',
            body: valors
    }) // Envia la petició utilitzant el mètode POST.
    .then(resposta => resposta.json()) // Es recull la resposta en format JSON
    .then(resultat => { //Quan s'ha recollit tota la resposta enviada, es desen dins 'resultat' i s'executa el que hi ha dins els claudators
        result.textContent =  "El resultat és " + resultat.suma; //suma té el mateix nom que el nom de clau que es posa a la línia 11 de sm6ex5.php						
    })
    .catch(errors => { //Gestió d'errors						
        result.textContent = "Error calculant la suma";
    });
}

function ViewOrder(code){
    const order = document.getElementById('order');
    // Construcció de la petició
    const ip = "localhost"; //adreça IP del servidor
    const path = "pj6/eCommerce/app/srv"; // carpeta a on es troba el fitxer PHP
    const filePHP = "getOrder.php"; // nom del fitxer PHP
    const request = "https://" + ip + "/" + path + "/" + filePHP + "?code=" + encodeURIComponent(code);
    //const peticio = fitxerPHP;
    
    // Enviat la petició, esperant la resposat i recollint la resposta sense haver de recarregar la página 
    fetch(request,{
        method: 'GET',
    }) // Envia la petició utilitzant el mètode GET.
    .then(response => response.json()) // Es recull la resposta en format JSON
    .then(result => { //Quan s'ha recollit tota la resposta enviada, es desen dins 'resultat' i s'executa el que hi ha dins els claudators
        order.innerHTML =  result.order; //suma té el mateix nom que el nom de clau que es posa a la línia 11 de sm6ex5.php						
    })
    .catch(errors => { //Gestió d'errors						
        order.innerHTML = "Error getting the order";
    });
}

//LAPTOP-Q7TN42MH