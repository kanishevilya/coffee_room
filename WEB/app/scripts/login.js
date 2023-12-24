async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}


let btn=document.querySelector("#loginBtn");

btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let login=document.querySelector("#login");
    let password=document.querySelector("#password");
    let path=`../app/apies/loginCheck.php?login=${login.value}&password=${password.value}`;
    console.log(path);
    getJson(path).then(resp=>{
        if(resp.response==true){
            alert("Вы успешно авторизовались!");
        }else{
            alert("Неверный логин или пароль!");
        }
    });
})