let formAvatar = document.getElementById("formUpdateAvatar");
let imgAvatar = document.getElementById("avatar");

formAvatar.addEventListener("submit", (e) => {
    e.preventDefault();

});

imgAvatar.addEventListener("change", (e) => {
    formAvatar.submit();
});