async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}


let form= document.querySelector("#form");
let select=form.category;
window.onload=(e)=>{
    getJson("../app/apies/getCategories.php").then(categories=>{
        categories.forEach(category => {
            let option=document.createElement("option");
            option.value=category.id_category;
            option.innerText=category.category_name;
            select.append(option);
        });
    });
}

let btn=form.add;
btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let name=form.product_name.value;
    let price=form.product_price.value;
    let id=select.value;
    form.product_name.value='';
    form.product_price.value='';
    getJson(`../app/apies/addProduct.php?name=${name}&price=${price}.php&id=${id}`).then(resp=>{
        if(resp.response==true){
            alert ("Продукт добавлен в общий список");
        }else{
            alert ("Ошибка добавления!!");
        }
    });
});