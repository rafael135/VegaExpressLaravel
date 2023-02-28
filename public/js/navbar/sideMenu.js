let sideBar = document.getElementById("asideUser-menu");
let btnUserSideBar = document.getElementById("btn-user-sideBar");

btnUserSideBar.addEventListener("click", (e) => {
    e.preventDefault();
    sideBar.classList.add("show");
});

document.addEventListener("click", (e) => {
    if (e.target.id != sideBar.id && e.target.id != btnUserSideBar.id && e.target.id != "btn-user-icon" && e
        .target.id != "dropdownUser1" && e.target.id != "img-usr") {
        sideBar.classList.remove("show");
    }
});