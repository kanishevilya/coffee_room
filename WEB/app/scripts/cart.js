
let makeOrderBtn = document.querySelector("#makeOrderBtn");
let productsBlock = document.querySelector("#productsBlock");
let cartEmpty = false;
function getBlock(product) {
    let block = document.createElement("div");
    block.classList.add("product");
    let img = document.createElement("div");
    img.classList.add("img");
    img.setAttribute("style", `background-image: url(${product.product_image});`)

    let rightBlock = document.createElement("div");
    rightBlock.classList.add("rightBlock");

    let name = document.createElement("p");
    name.textContent = product.name;
    name.classList.add("productTitle");

    let subtitle = document.createElement("p");
    subtitle.textContent = product.product_description;
    subtitle.classList.add("subtitle");


    let lowerBlock = document.createElement("div");
    lowerBlock.classList.add("lowerBlock");

    let price = document.createElement("p");
    price.textContent = product.priceEach + "$";
    price.classList.add("productPrice");

    let remove = document.createElement("p");
    remove.textContent = "REMOVE";
    remove.classList.add("remove");
    lowerBlock.append(price, remove);

    rightBlock.append(name, subtitle, lowerBlock);
    remove.addEventListener("click", (e) => {
        getJson(`/ilya/EXAM/MVC/cart/removeProduct?id_cart=${product.id_cartDetails}`).then(resp => {
            if (resp.message == "You are not logged in to your account!") {
                alert("You are not logged in to your account!");
            } else {
                alert("Successful remove");
                window.location.href = "/ilya/EXAM/WEB/cart";
            }
        });
    });


    block.append(img, rightBlock);
    return block;
}

window.onload = (e) => {
    getJson(`/ilya/EXAM/MVC/cart/getProducts`).then(resp => {
        if (resp.message != null) {
            alert("You are not logged in to your account!");
        } else {
            productsBlock.innerHTML = '';
            resp.forEach(product => {
                console.log(getBlock(product));
                productsBlock.append(getBlock(product));
            });
            if (resp.length == 0) {
                cartEmpty = true;
                let text = document.createElement("p");
                text.setAttribute("style", "padding-top:40px;");
                text.classList.add("productPrice");
                text.textContent = "Cart is empty!!";
                productsBlock.append(text);
            } else {
                cartEmpty = false
            }
        }
    });
}



let form = document.querySelector("#form");
form.onsubmit = (e) => {
    let number = form.number.value;
    let month = form.month.value;
    let year = form.year.value;
    let code = form.code.value;
    if (cartEmpty == false) {

        getJson(`/ilya/EXAM/MVC/order/payOrder?number=${number}&month=${month}&year=${year}&code=${code}`).then(resp => {
            if (resp.message == "Payment completed!") {

                getJson(`/ilya/EXAM/MVC/order/makeOrder`).then(resp => {});
                alert("Order Addition");
            } else {
                alert(resp.message);
            }
        });
    } else {
        alert("Cart is empty!!");
    }
}