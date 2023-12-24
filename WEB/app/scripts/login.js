
let form = document.querySelector("#form");

form.onsubmit = (e) => {
    e.preventDefault();
    let login = form.login;
    let password = form.password;
    let path = `/ilya/EXAM/MVC/user/authentication?login=${login.value}&password=${password.value}`;
    getJson(path).then(resp => {
        alert(resp.message);
        window.location.href="/ilya/EXAM/WEB/home";
    });
}

