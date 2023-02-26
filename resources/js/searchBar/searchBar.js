let collapseSearchBar = document.getElementById("filtersCollapse");
let btnCollapse = document.getElementById("btn-collapse");
let searchInput = document.getElementById("searchInput");

collapseSearchBar.addEventListener("transitionstart", () => {
    btnCollapse.classList.toggle("opened");
    searchInput.classList.toggle("opened");
});