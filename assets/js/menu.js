function toggleMenu() {

    const menu = document.getElementById('menu');
    const svg = document.getElementById('menu-tag').children[0].children[0].children;
    
    const tps = 30;
    const tick = 1000 / tps;
    const ticks = 18;
    const deg = 45;

    var isOpened = menu.getAttribute('class') == 'open' ? true : false;

    if (isOpened) {
        menu.removeAttribute('class');
        for (let i = 1; i <= ticks; i++) {
            setTimeout(function () {
                svg[0].setAttribute('transform', `rotate(${deg - deg * i / ticks},0,30)`);
                svg[1].setAttribute('transform', `translate(${50 - 50 * i / ticks}, 0) scale(${1 * i / ticks},1)`);
                svg[2].setAttribute('transform', `rotate(${-deg + deg * i / ticks},0,70))`);
            }, tick * i);
        }
        isOpened = false;
    } else {
        menu.setAttribute('class', 'open');
        for (let i = 1; i <= ticks; i++) {
            setTimeout(function () {
                svg[0].setAttribute('transform', `rotate(${deg * i / ticks},0,30)`);
                svg[1].setAttribute('transform', `translate(${50 * i / ticks}, 0) scale(${1 - 1 * i / ticks},1)`);
                svg[2].setAttribute('transform', `rotate(${-deg * i / ticks},0,70)`);
            }, tick * i);
        }
        isOpened = true;
    }

    var menuStatus = isOpened ? 'opened' : 'closed'
    console.log(`The menu is ${menuStatus}.`);

}