function headerLinks() {
    let nav = document.getElementsByTagName("nav")[0];

    let links = nav.getElementsByTagName("a");

    for (let i = 0; i < links.length; i++) {
        links[i].setAttribute("onclick", "toggleActiveLink(this);");
    }
}

function toggleActiveLink(link) {
    let nav = document.getElementsByTagName("nav")[0];
    let current = nav.getElementsByClassName("active");
    current[0].classList.remove("active");
    link.classList.add("active");
}

var menu_is_opened = false;

function toggleMenu() {

    let menu = document.getElementById("menu");
    
    menu.classList.toggle("opened");

}