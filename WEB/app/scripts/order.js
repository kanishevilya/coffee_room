function getBlock(order) {
    let block = document.createElement("div");
    block.classList.add("order");

    let id = document.createElement("p");
    id.textContent ="Order id: "+ order.id_order;
    id.classList.add("id");

    let orderDate = document.createElement("p");
    orderDate.textContent ="Order Date: "+  order.orderDate;
    orderDate.classList.add("orderDate");
    
    
    let deliveryDate = document.createElement("p");
    deliveryDate.textContent ="Delivery Date: "+  order.deliveryDate;
    deliveryDate.classList.add("deliveryDate");

    let price = document.createElement("p");
    price.textContent ="Total Price: "+ order.total_price + "$";
    price.classList.add("price");



    block.append(id, orderDate, deliveryDate, price);
    return block;
}
let ordersBlock=document.querySelector("#ordersBlock");
window.onload = (e) => {
    getJson(`/ilya/EXAM/MVC/order/getOrders`).then(resp => {
        if (resp.message != null) {
            alert("You are not logged in to your account!");
        } else {
            ordersBlock.innerHTML = '';
            resp.forEach(order => {
                ordersBlock.append(getBlock(order));
            });
        }
    });
}
