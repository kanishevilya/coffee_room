async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}



let btn=form.add;
btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let name=form.category_name.value;
    form.category_name.value='';
    getJson(`../app/apies/addCategory.php?name=${name}`).then(resp=>{
        if(resp.response==true){
            alert ("Категория добавлена в общий список");
        }else{
            alert ("Ошибка добавления!!");
        }
    });
});