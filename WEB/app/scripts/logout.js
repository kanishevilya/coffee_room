let href = document.querySelector("#logout");
href.addEventListener("click", (e) => {
    e.preventDefault();
    getJson("/ilya/EXAM/MVC/user/logout").then(resp => {
        alert(resp.message);
        window.location.href="/ilya/EXAM/WEB/home";
    });
});