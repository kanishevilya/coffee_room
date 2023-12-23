async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}


let btn=document.querySelector("#addToCartBtn");

btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let id=(document.querySelector("#idProduct")).value;
    getJson(`app/apies/addToCart.php?id=${id}}`).then(resp=>{
        if(resp.response==true){
            alert("Продукт добавлен в корзину!");
        }else{
            alert("Авторизуйтесь!!");
        }
    });
});