function toggleMenu() {

    const menu = document.getElementById('menu');
    const menu_tag = document.getElementById('menu-tag');

    var isOpened = menu.getAttribute('class') == 'open' ? true : false;

    if (isOpened) {
        menu.removeAttribute('class');
        menu_tag.removeAttribute('class');
        isOpened = false;
    } else {
        menu.setAttribute('class', 'open');
        menu_tag.setAttribute('class', 'open');
        isOpened = true;
    }

    var menuStatus = isOpened ? 'opened' : 'closed'
    console.log(`The menu is ${menuStatus}.`);

}