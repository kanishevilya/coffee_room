async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}

let makeOrderBtn=document.querySelector("#makeOrderBtn");
makeOrderBtn.addEventListener("click",(e)=>{
    e.preventDefault();

    getJson(`app/apies/makeAnOrder.php`).then(resp=>{
        if(resp.response==true){
            let dataBlock=document.querySelector("#data");
            dataBlock.innerHTML='';
            alert("Заказ выполнен!");
        }else{
            alert("Ошибка обработки заказа!");
        }
    });
});