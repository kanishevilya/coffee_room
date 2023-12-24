let productsBlock = document.querySelector("#productsBlock");


function getBlock(product) {
    let block = document.createElement("div");
    block.classList.add("product");
    let img = document.createElement("div");
    img.classList.add("img");
    img.setAttribute("style", `background-image: url(${product.product_image});`)


    let name = document.createElement("p");
    name.textContent = product.product_name;
    name.classList.add("productTitle");

    let lowerBlock = document.createElement("div");
    lowerBlock.classList.add("lowerBlock");

    let price = document.createElement("p");
    price.textContent = product.price + "$";
    price.classList.add("productPrice");

    let add = document.createElement("div");
    add.textContent = "+";
    add.classList.add("addBlock");
    add.addEventListener("click",(e)=>{
        getJson(`/ilya/EXAM/MVC/cart/addProduct?id_product=${product.id_product}&amount=1&modifications=[{"size":"tall"}]`).then(resp => {
            if(resp.message=="You are not logged in to your account!"){
                alert("You are not logged in to your account!");
            }else{
                alert("Successful addition");
            }
        });
    });

    lowerBlock.append(price, add);
    block.append(img, name, lowerBlock);
    return block;
}

window.onload = (e) => {
    let path = `/ilya/EXAM/MVC/store/getAllBaseProducts`;
    let selectAllergens=document.querySelector("#select__allergens");
    let selectAdditions=document.querySelector("#select__additions");
    getJson("/ilya/EXAM/MVC/store/getAllAllergens").then(resp => {
        selectAllergens.innerHTML = "";
        let option = document.createElement("option");
        option.value = "0";
        option.textContent = "Nothing";
        selectAllergens.append(option);

        resp.forEach(allergen => {
            option = document.createElement("option");
            option.value=allergen.id_allergen;
            option.textContent=allergen.allergen_name;
            selectAllergens.append(option);
        });
    });
    getJson("/ilya/EXAM/MVC/store/getAllAdditions").then(resp => {
        selectAdditions.innerHTML = "";
        let option = document.createElement("option");
        option.value = "0";
        option.textContent = "Nothing";
        selectAdditions.append(option);

        resp.forEach(addition => {
            option = document.createElement("option");
            option.value=addition.id_addition;
            option.textContent=addition.name;
            selectAdditions.append(option);
        });
    });
    getJson(path).then(resp => {
        productsBlock.innerHTML='';
        resp.forEach(product => {
            productsBlock.append(getBlock(product));
        });
    });
}

let form=document.querySelector("#form");

form.onsubmit = (e) => {
    e.preventDefault();
    let min__price = form.min__price.value;
    let max__price = form.max__price.value;
    let name = form.input__name.value;
    let select__category=(document.querySelector("#select__category")).value;
    let select__sort=(document.querySelector("#select__sort")).value;
    let selectAllergens=(document.querySelector("#select__allergens")).value;
    let selectAdditions=(document.querySelector("#select__additions")).value;
    if(selectAllergens==0){selectAllergens="";}
    if(selectAdditions==0){selectAdditions="";}
    if(select__sort==0){select__sort="";}
    let priceSort="";
    let nameSort="";

    if(select__sort==1){priceSort=false;nameSort="";}
    else if(select__sort==2){priceSort=true;nameSort="";}
    else if(select__sort==3){nameSort=true;priceSort="";}
    else if(select__sort == 4){nameSort=false;priceSort="";}
    if(select__category==0){select__category="";}
    let path = `/ilya/EXAM/MVC/store/getProductsByFilter?minPrice=${min__price}&maxPrice=${max__price}&name=${name}&id_type=${select__category}&isAscPrice=${priceSort}&isAscName=${nameSort}&allergens=[${selectAllergens}]&additions=[${selectAdditions}]`;
    console.log(path);
    getJson(path).then(resp => {
        productsBlock.innerHTML='';
        resp.forEach(product => {
            productsBlock.append(getBlock(product));
        });
    });
}