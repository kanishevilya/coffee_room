async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}

let select=form.id;
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
    let name=form.category_name.value;
    form.category_name.value='';
    getJson(`../app/apies/updateCategory.php?name=${name}&id=${select.value}`).then(resp=>{
        if(resp.response==true){
            alert ("Категория обновлена!");
        }else{
            alert ("Ошибка обновления!!");
        }
    });
});