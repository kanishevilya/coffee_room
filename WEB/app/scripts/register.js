
let form = document.querySelector("#form");

form.onsubmit = (e) => {
    console.log(1);
    e.preventDefault();
    let login = form.login.value;
    let password1 = form.password1.value;
    let password2 = form.password2.value;
    let email = form.email.value;
    let address = form.address.value;

    let path = `/ilya/EXAM/MVC/user/registration?login=${login}&email=${email}&address=${address}&password1=${password1}&password2=${password2}`;
    getJson(path).then(resp => {
        alert(resp.message);
        window.location.href="/ilya/EXAM/WEB/home";
    });
}
