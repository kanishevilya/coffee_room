async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}


let form= document.querySelector("#form");
let selectCat=form.category;
let selectId=form.id;
window.onload=(e)=>{
    getJson("../app/apies/getCategories.php").then(categories=>{
        categories.forEach(category => {
            let option=document.createElement("option");
            option.value=category.id_category;
            option.innerText=category.category_name;
            selectCat.append(option);
        });
    });
    getJson("../app/apies/getProducts.php").then(products=>{
        products.forEach(product => {
            let option=document.createElement("option");
            option.value=product.id_product;
            option.innerText=product.product_name;
            selectId.append(option);
        });
    });
}

let btn=form.add;
btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let id=selectId.value
    let name=form.product_name.value;
    let price=form.product_price.value;
    let id_сat=selectCat.value;
    form.product_name.value='';
    form.product_price.value='';
    getJson(`../app/apies/updateProduct.php?name=${name}&id=${id}&price=${price}.php&id_category=${id_сat}`).then(resp=>{
        if(resp.response==true){
            alert ("Продукт обновлен");
        }else{
            alert ("Ошибка обновления!!");
        }
    });
});