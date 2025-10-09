function NewOrder(){
    
}

function ViewOrder(code){
    document.getElementById('order');
}

function ViewOrders(){
    document.getElementById('orders');
}

window.onload = function(){
    if(document.getElementById('orders') != null){
        ViewOrders();
    }
}